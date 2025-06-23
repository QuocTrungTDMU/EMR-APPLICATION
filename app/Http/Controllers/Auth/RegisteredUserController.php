<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\AccountActivationMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation với custom messages
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10,11}$/', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại phải có 10-11 chữ số.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        // Kiểm tra email đã tồn tại trong local DB
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return back()
                ->withInput($request->only(['name', 'email', 'phone']))
                ->withErrors(['email' => 'Email này đã được sử dụng.']);
        }

        try {
            // Gọi API đăng ký NKS với proper headers
            $response = Http::timeout(30)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://account.nks.vn/api/nks/user/register', [
                    'name' => trim($request->name),
                    'email' => strtolower(trim($request->email)),
                    'phone' => trim($request->phone),
                    'password' => $request->password,
                ]);

            Log::info('API Register Response', [
                'status' => $response->status(),
                'body' => $response->body(),
                'email' => $request->email
            ]);

            if ($response->successful()) {
                $apiData = $response->json();

                // Kiểm tra response structure từ API
                if (isset($apiData['success']) && $apiData['success'] === true) {
                    $userData = $apiData['data'] ?? [];
                    $activationToken = $userData['activation_token'] ?? null;

                    // Tạo user local với đầy đủ thông tin
                    $user = User::create([
                        'name' => trim($request->name),
                        'email' => strtolower(trim($request->email)),
                        'phone' => trim($request->phone),
                        'password' => Hash::make($request->password),
                        'nks_user_id' => $userData['id'] ?? null,
                        'activation_code' => $activationToken,
                        'status' => 'pending',
                        'email_verified_at' => null,
                        'created_at' => isset($userData['created_at']) ?
                            \Carbon\Carbon::parse($userData['created_at']) : now(),
                    ]);

                    // Log user creation
                    Log::info('User created successfully', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'nks_user_id' => $user->nks_user_id,
                        'has_activation_token' => !empty($activationToken)
                    ]);

                    // Gửi email kích hoạt
                    if ($activationToken) {
                        try {
                            Mail::to($user->email)->send(new AccountActivationMail($user, $activationToken));
                            Log::info('Activation email sent', ['user_id' => $user->id, 'email' => $user->email]);
                        } catch (\Exception $mailException) {
                            Log::error('Failed to send activation email', [
                                'user_id' => $user->id,
                                'email' => $user->email,
                                'error' => $mailException->getMessage()
                            ]);
                            // Không throw exception, vẫn cho phép user tiếp tục
                        }
                    }

                    // Trigger registered event
                    event(new Registered($user));

                    // Lưu thông tin vào session cho trang verification
                    session([
                        'pending_verification_user_id' => $user->id,
                        'pending_verification_email' => $user->email,
                        'pending_verification_name' => $user->name,
                        'activation_token_sent' => !empty($activationToken),
                        'registration_completed' => true
                    ]);

                    // Redirect đến trang verification
                    return redirect()->route('verification.notice')
                        ->with('success', 'Đăng ký thành công! Chúng tôi đã gửi email kích hoạt đến ' . $user->email);
                } else {
                    // API trả về success = false
                    $errorMessage = $apiData['message'] ?? 'Đăng ký không thành công từ server.';
                    Log::warning('API returned success=false', [
                        'response' => $apiData,
                        'email' => $request->email
                    ]);

                    throw new \Exception($errorMessage);
                }
            } else {
                // Xử lý lỗi HTTP từ API
                $errorData = $response->json();

                Log::error('API Registration failed', [
                    'status' => $response->status(),
                    'response' => $errorData,
                    'email' => $request->email
                ]);

                // Xử lý validation errors từ API (422 hoặc 500)
                if (in_array($response->status(), [422, 500]) && isset($errorData['message'])) {
                    $apiErrors = $errorData['message'];

                    if (is_array($apiErrors)) {
                        $validationErrors = $this->parseApiValidationErrors($apiErrors);

                        if (!empty($validationErrors)) {
                            throw ValidationException::withMessages($validationErrors);
                        }
                    } else if (is_string($apiErrors)) {
                        // Xử lý string error message
                        $validationErrors = $this->parseStringApiErrors($apiErrors);

                        if (!empty($validationErrors)) {
                            throw ValidationException::withMessages($validationErrors);
                        }
                    }
                }

                // Lỗi khác từ API
                $errorMessage = $errorData['message'] ?? 'Lỗi kết nối đến server. Vui lòng thử lại sau.';
                throw new \Exception($errorMessage);
            }
        } catch (ValidationException $e) {
            // Re-throw validation errors để hiển thị form errors
            throw $e;
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Lỗi kết nối network
            Log::error('Network connection error during registration', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return back()
                ->withInput($request->only(['name', 'email', 'phone']))
                ->withErrors(['api' => 'Không thể kết nối đến server. Vui lòng kiểm tra kết nối mạng và thử lại.']);
        } catch (\Exception $e) {
            // Lỗi chung
            Log::error('Registration error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->only(['name', 'email', 'phone'])
            ]);

            return back()
                ->withInput($request->only(['name', 'email', 'phone']))
                ->withErrors(['api' => $e->getMessage()]);
        }
    }

    /**
     * Parse validation errors từ API response (array format)
     */
    private function parseApiValidationErrors(array $apiErrors): array
    {
        $validationErrors = [];

        foreach ($apiErrors as $field => $messages) {
            if (is_array($messages)) {
                // Convert sang tiếng Việt
                $translatedMessages = array_map(function ($message) {
                    return $this->translateValidationMessage($message);
                }, $messages);

                $validationErrors[$field] = $translatedMessages;
            } else if (is_string($messages)) {
                $validationErrors[$field] = [$this->translateValidationMessage($messages)];
            }
        }

        return $validationErrors;
    }

    /**
     * Parse validation errors từ string message
     */
    private function parseStringApiErrors(string $errorMessage): array
    {
        $validationErrors = [];

        // Common patterns từ API
        if (str_contains($errorMessage, 'name has already been taken')) {
            $validationErrors['name'] = ['Tên này đã được sử dụng.'];
        }
        if (str_contains($errorMessage, 'email has already been taken')) {
            $validationErrors['email'] = ['Email này đã được sử dụng.'];
        }
        if (str_contains($errorMessage, 'phone has already been taken')) {
            $validationErrors['phone'] = ['Số điện thoại này đã được sử dụng.'];
        }

        // Nếu không match pattern nào, trả về general error
        if (empty($validationErrors)) {
            $validationErrors['api'] = [$errorMessage];
        }

        return $validationErrors;
    }

    /**
     * Translate validation message sang tiếng Việt
     */
    private function translateValidationMessage(string $message): string
    {
        $translations = [
            'The name has already been taken.' => 'Tên này đã được sử dụng.',
            'The email has already been taken.' => 'Email này đã được sử dụng.',
            'The phone has already been taken.' => 'Số điện thoại này đã được sử dụng.',
            'The name field is required.' => 'Trường tên là bắt buộc.',
            'The email field is required.' => 'Trường email là bắt buộc.',
            'The phone field is required.' => 'Trường số điện thoại là bắt buộc.',
            'The password field is required.' => 'Trường mật khẩu là bắt buộc.',
            'The email must be a valid email address.' => 'Email phải là địa chỉ email hợp lệ.',
        ];
        return $translations[$message] ?? $message;

    }
}
