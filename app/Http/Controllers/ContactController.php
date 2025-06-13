<?php
// app/Http/Controllers/ContactController.php - FIXED without Mail::failures()

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userData = null;

        if ($user && $user->nks_access_token) {
            $userData = $this->getUserDataFromNKS($user);
        } elseif ($user) {
            $userData = [
                'name' => $user->name ?? '',
                'email' => $user->email ?? '',
                'phone' => $user->phone ?? '',
            ];
        }

        return view('contact', compact('userData'));
    }

    public function submit(Request $request)
    {
        Log::info('=== CONTACT FORM SUBMIT START ===');

        $user = Auth::user();
        $nksUserData = null;

        if ($user && $user->nks_access_token) {
            $nksUserData = $this->getUserDataFromNKS($user);
        }

        // ✅ VALIDATION
        $rules = [
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
        ];

        if (!$user) {
            $rules['name'] = 'required|string|min:2|max:255';
            $rules['email'] = 'required|email|max:255';
        }
        $rules['phone'] = 'nullable|string|max:20';

        try {
            $validatedData = $request->validate($rules, [
                'name.required' => 'Vui lòng nhập họ tên.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'subject.required' => 'Vui lòng chọn chủ đề.',
                'message.required' => 'Vui lòng nhập nội dung tin nhắn.',
            ]);

            // ✅ PREPARE EMAIL DATA
            $emailData = [
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'phone' => $request->input('phone', ''),
                'is_authenticated' => false,
                'has_nks_data' => false,
                'name' => '',
                'email' => '',
                'nks_id' => null,
                'user_id' => null,
            ];

            if ($user && $nksUserData) {
                $emailData['is_authenticated'] = true;
                $emailData['has_nks_data'] = true;
                $emailData['name'] = $nksUserData['name'] ?? $user->name ?? 'User';
                $emailData['email'] = $nksUserData['email'] ?? $user->email ?? '';
                $emailData['nks_id'] = $nksUserData['nks_id'] ?? null;
                $emailData['user_id'] = $user->id ?? null;

                if (!empty($nksUserData['phone'])) {
                    $emailData['phone'] = $nksUserData['phone'];
                }
            } elseif ($user) {
                $emailData['is_authenticated'] = true;
                $emailData['name'] = $user->name ?? 'User';
                $emailData['email'] = $user->email ?? '';
                $emailData['user_id'] = $user->id ?? null;
            } else {
                $emailData['name'] = $validatedData['name'] ?? 'Guest';
                $emailData['email'] = $validatedData['email'] ?? '';
            }

            // ✅ SEND EMAIL với proper try-catch thay vì Mail::failures()
            $adminEmail = config('mail.admin_email', 'enjoy4624@gmail.com');

            try {
                Mail::to($adminEmail)->send(new ContactMail($emailData));

                Log::info('✅ Contact email sent successfully', [
                    'to' => $adminEmail,
                    'from' => $emailData['email'],
                    'subject' => $emailData['subject'],
                    'is_authenticated' => $emailData['is_authenticated'],
                    'has_nks_data' => $emailData['has_nks_data']
                ]);
            } catch (\Symfony\Component\Mailer\Exception\TransportException $e) {
                // ✅ SMTP Transport errors
                Log::error('SMTP transport error', [
                    'error' => $e->getMessage(),
                    'email' => $emailData['email']
                ]);
                throw new \Exception('Email delivery failed: SMTP connection error. Please try again later.');
            } catch (\Symfony\Component\Mime\Exception\InvalidArgumentException $e) {
                // ✅ Invalid email format errors
                Log::error('Invalid email format', [
                    'error' => $e->getMessage(),
                    'email' => $emailData['email']
                ]);
                throw new \Exception('Invalid email format. Please check your email address.');
            } catch (\Exception $e) {
                // ✅ General email sending errors
                Log::error('Email sending failed', [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'email' => $emailData['email']
                ]);
                throw new \Exception('Failed to send email: ' . $e->getMessage());
            }

            // ✅ SUCCESS MESSAGE
            $successMessage = $user
                ? "🎉 Cảm ơn {$emailData['name']}! Tin nhắn đã được gửi thành công."
                : '🎉 Cảm ơn bạn đã liên hệ! Tin nhắn đã được gửi thành công.';

            return back()->with('success', $successMessage);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return back()->withErrors($e)->withInput();
        } catch (\Exception $e) {
            Log::error('Contact form error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    private function getUserDataFromNKS($user)
    {
        $cacheKey = 'nks_user_' . $user->id;

        $cachedData = Cache::get($cacheKey);
        if ($cachedData) {
            return $cachedData;
        }

        $nksToken = $user->nks_access_token ?? null;
        if (!$nksToken) {
            return null;
        }

        try {
            $client = new Client();
            $response = $client->post('https://account.nks.vn/api/nks/user', [
                'multipart' => [
                    [
                        'name'     => 'access_token',
                        'contents' => $nksToken,
                    ]
                ],
                'timeout' => 10,
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if (!is_array($data) || !isset($data['success']) || $data['success'] !== true) {
                throw new \Exception('Invalid NKS API response format');
            }

            if (!isset($data['data']) || !is_array($data['data'])) {
                throw new \Exception('Missing data in NKS API response');
            }

            $apiData = $data['data'];

            $userData = [
                'name' => $apiData['name'] ?? $user->name ?? 'User',
                'email' => $apiData['email'] ?? $user->email ?? '',
                'phone' => $apiData['phone'] ?? null,
                'nks_id' => $apiData['id'] ?? null,
            ];

            if (empty($userData['email'])) {
                throw new \Exception('Email is required but not found in API response');
            }

            Cache::put($cacheKey, $userData, 900);

            Log::info('NKS data retrieved successfully', [
                'user_id' => $user->id,
                'name' => $userData['name'],
                'email' => $userData['email']
            ]);

            return $userData;
        } catch (\Exception $e) {
            Log::error('NKS API failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }
}
