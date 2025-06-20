<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\IpHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Register new user
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'fbtoken' => ['sometimes', 'string'],
            'device' => ['sometimes', 'string', 'max:50'],
        ]);

        $realIP = IpHelper::getRealClientIP($request);

        Log::info('User registration attempt', [
            'email' => $request->email,
            'real_ip' => $realIP,
            'device' => $request->device ?? 'Unknown',
            'has_fbtoken' => !empty($request->fbtoken),
            'user_agent' => $request->userAgent()
        ]);

        Log::channel('nks_debug')->info('=== NKS LOGIN START ===', [
            'timestamp' => now()->toISOString(),
            'request_method' => $request->method(),
            'request_url' => $request->fullUrl(),
            'request_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'all_headers' => $request->headers->all(),
            'request_data' => $request->except(['password']),
            'has_password' => !empty($request->password),
            'password_length' => $request->password ? strlen($request->password) : 0,
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'last_login_ip' => $realIP,
                'last_device' => $request->device ?? 'Web',
                'email_verified_at' => null,
            ]);

            event(new Registered($user));

            DB::commit();

            Log::info('User registration successful', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập bằng NKS để xác thực.',
                'data' => [
                    'user' => $user->makeHidden(['nks_access_token']),
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Registration failed', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Đăng ký thất bại. Vui lòng thử lại.',
                'error_code' => 'REGISTRATION_FAILED'
            ], 500);
        }
    }

    /**
     * Login with Laravel authentication - DISABLED
     */
    public function login(Request $request): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => 'Vui lòng sử dụng đăng nhập NKS',
            'error_code' => 'LOCAL_LOGIN_DISABLED'
        ], 403);
    }

    /**
     * Login with NKS API only - CHỈ lưu user local + access token
     */
    public function nksLogin(Request $request)
    {
        // Validation chỉ email và password
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        $realIP = IpHelper::getRealClientIP($request);

        Log::info('NKS Login attempt', [
            'email' => $request->email,
            'real_ip' => $realIP,
            'user_agent' => $request->userAgent()
        ]);

        try {
            // Gọi NKS API để xác thực
            $response = Http::timeout(30)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://account.nks.vn/api/nks/user/login', [
                    'username' => $request->email, // NKS API dùng 'username' cho email
                    'password' => $request->password,
                ]);

            // Kiểm tra response từ NKS
            if (!$response->successful()) {
                $statusCode = $response->status();

                Log::warning('NKS API authentication failed', [
                    'email' => $request->email,
                    'status' => $statusCode,
                    'response' => $response->body()
                ]);

                $errorMessage = match ($statusCode) {
                    401 => 'Email hoặc mật khẩu không chính xác',
                    403 => 'Tài khoản đã bị khóa',
                    404 => 'Tài khoản không tồn tại trong hệ thống NKS',
                    429 => 'Quá nhiều lần thử đăng nhập. Vui lòng thử lại sau',
                    500, 502, 503 => 'Máy chủ NKS đang bảo trì. Vui lòng thử lại sau',
                    default => 'Không thể kết nối đến hệ thống NKS'
                };

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $errorMessage,
                        'error_code' => 'NKS_AUTH_FAILED',
                    ], min($statusCode, 422));
                } else {
                    return back()->withErrors(['email' => $errorMessage])->withInput();
                }
            }

            $nksData = $response->json();

            // Kiểm tra cấu trúc response từ NKS
            if (!isset($nksData['success']) || $nksData['success'] !== true) {
                Log::error('NKS API returned invalid response', [
                    'email' => $request->email,
                    'response' => $nksData
                ]);

                $message = 'Phản hồi không hợp lệ từ NKS';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_INVALID_RESPONSE'
                    ], 422);
                } else {
                    return back()->withErrors(['email' => $message])->withInput();
                }
            }

            // Lấy dữ liệu từ NKS response
            $responseData = $nksData['data'] ?? [];
            $nksUser = $responseData['user'] ?? [];
            $nksAccessToken = $responseData['access_token'] ?? null;
            $expiresAt = $responseData['expires_at'] ?? null;

            if (!$nksAccessToken || empty($nksUser)) {
                Log::error('NKS response missing required data', [
                    'email' => $request->email,
                    'has_token' => !empty($nksAccessToken),
                    'has_user' => !empty($nksUser)
                ]);

                $message = 'Dữ liệu xác thực từ NKS không đầy đủ';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_INCOMPLETE_DATA'
                    ], 422);
                } else {
                    return back()->withErrors(['email' => $message])->withInput();
                }
            }

            // Kiểm tra trạng thái user trong NKS
            if (isset($nksUser['active']) && !$nksUser['active']) {
                Log::warning('NKS user account is not active', [
                    'email' => $request->email,
                    'nks_user_id' => $nksUser['id'] ?? null
                ]);

                $message = 'Tài khoản đã bị vô hiệu hóa trong hệ thống NKS';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_ACCOUNT_INACTIVE'
                    ], 403);
                } else {
                    return back()->withErrors(['email' => $message])->withInput();
                }
            }

            // Lưu hoặc cập nhật user local với NKS data
            DB::beginTransaction();
            try {
                $user = User::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'name' => $nksUser['name'] ?? 'NKS User',
                        'nks_user_id' => $nksUser['id'] ?? null,
                        'nks_access_token' => $nksAccessToken,
                        'nks_expires_at' => $expiresAt ? Carbon::parse($expiresAt) : null,
                        'last_login_at' => now(),
                        'last_login_ip' => $realIP,
                        'status' => 'active',
                    ]
                );

                // ✅ QUAN TRỌNG: Login user vào Laravel authentication system
                Auth::login($user, true); // true = remember me

                // ✅ Regenerate session để bảo mật
                $request->session()->regenerate();

                DB::commit();

                Log::info('NKS login successful with Laravel auth', [
                    'user_id' => $user->id,
                    'nks_user_id' => $user->nks_user_id,
                    'email' => $request->email,
                    'auth_check' => Auth::check(),
                    'session_id' => session()->getId()
                ]);

                // Trả về response với NKS access token
                $responseData = [
                    'success' => true,
                    'message' => 'Đăng nhập thành công',
                    'data' => [
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'nks_user_id' => $user->nks_user_id,
                        ],
                        'access_token' => $nksAccessToken, // NKS access token
                        'token_type' => 'Bearer',
                        'expires_at' => $expiresAt,
                        'nks_user_data' => $nksUser, // Full NKS user data
                        'redirect_url' => '/', // ✅ Thêm redirect URL cho frontend
                    ]
                ];

                if ($request->expectsJson()) {
                    return response()->json($responseData);
                } else {
                    // ✅ Lưu vào session cho web (sau khi đã login)
                    session([
                        'nks_access_token' => $nksAccessToken,
                        'nks_user' => $nksUser,
                        'local_user_id' => $user->id
                    ]);

                    // ✅ Redirect về homepage
                    return redirect('/');
                }
            } catch (\Exception $dbError) {
                DB::rollback();

                Log::error('Database error during NKS login', [
                    'error' => $dbError->getMessage(),
                    'trace' => $dbError->getTraceAsString(),
                    'email' => $request->email
                ]);

                $message = 'Không thể lưu thông tin đăng nhập: ' . $dbError->getMessage();

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'DATABASE_ERROR'
                    ], 500);
                } else {
                    return back()->withErrors(['email' => $message])->withInput();
                }
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('NKS API connection failed', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            $message = 'Không thể kết nối đến hệ thống NKS. Vui lòng kiểm tra kết nối mạng.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'error_code' => 'NKS_CONNECTION_ERROR'
                ], 503);
            } else {
                return back()->withErrors(['email' => $message])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Unexpected error during NKS login', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'email' => $request->email
            ]);

            $message = 'Đã xảy ra lỗi không mong muốn. Vui lòng thử lại.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'error_code' => 'UNEXPECTED_ERROR'
                ], 500);
            } else {
                return back()->withErrors(['email' => $message])->withInput();
            }
        }
    }


    /**
     * Get NKS user info
     */
    public function nksUserInfo(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        try {
            $user = User::find($request->user_id);

            if (!$user || !$user->hasValidNksToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User không tồn tại hoặc token đã hết hạn',
                    'error_code' => 'INVALID_USER_TOKEN'
                ], 401);
            }

            // Gọi NKS API để lấy thông tin user
            $response = $user->callNksApi('https://account.nks.vn/api/nks/user');

            if ($response->successful()) {
                $nksData = $response->json();

                return response()->json([
                    'success' => true,
                    'data' => [
                        'local_user' => $user->makeHidden(['nks_access_token']),
                        'nks_user' => $nksData['data'] ?? $nksData,
                    ]
                ]);
            } else {
                // Token có thể đã hết hạn
                if ($response->status() === 401) {
                    $user->update(['nks_access_token' => null, 'nks_expires_at' => null]);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Không thể lấy thông tin từ NKS',
                    'error_code' => 'NKS_API_ERROR'
                ], 422);
            }
        } catch (\Exception $e) {
            Log::error('Get user info error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi lấy thông tin user',
                'error_code' => 'GET_USER_ERROR'
            ], 500);
        }
    }

    /**
     * Logout user - xóa NKS token khỏi local database
     */
    public function logout(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        try {
            $user = User::find($request->user_id);

            if ($user) {
                $user->update([
                    'nks_access_token' => null,
                    'nks_expires_at' => null,
                ]);

                Log::info('User logged out', [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
            }

            // Clear session for web
            if (!$request->expectsJson()) {
                session()->forget(['nks_access_token', 'nks_user', 'local_user_id']);
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công'
            ]);
        } catch (\Exception $e) {
            Log::error('Logout error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi đăng xuất',
                'error_code' => 'LOGOUT_ERROR'
            ], 500);
        }
    }

    /**
     * Logout from all devices - xóa tất cả NKS tokens
     */
    public function logoutAll(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        try {
            $user = User::find($request->user_id);

            if ($user) {
                // Xóa NKS token của user này
                $user->update([
                    'nks_access_token' => null,
                    'nks_expires_at' => null,
                ]);

                Log::info('User logged out from all devices', [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất khỏi tất cả thiết bị thành công'
            ]);
        } catch (\Exception $e) {
            Log::error('Logout all error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi đăng xuất',
                'error_code' => 'LOGOUT_ALL_ERROR'
            ], 500);
        }
    }

    /**
     * Get authenticated user info
     */
    public function me(Request $request): JsonResponse
    {
        $request->validate([
            'access_token' => ['required', 'string'],
        ]);

        try {
            $user = User::where('nks_access_token', $request->access_token)->first();

            if (!$user || !$user->hasValidNksToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token không hợp lệ hoặc đã hết hạn',
                    'error_code' => 'INVALID_TOKEN'
                ], 401);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user->makeHidden(['nks_access_token']),
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Get user by token error', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi validate token',
                'error_code' => 'TOKEN_VALIDATION_ERROR'
            ], 500);
        }
    }

    /**
     * Refresh token - Lấy token mới từ NKS
     */
    public function refreshToken(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        try {
            $user = User::find($request->user_id);

            if (!$user || !$user->hasValidNksToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User không tồn tại hoặc token đã hết hạn',
                    'error_code' => 'INVALID_USER_TOKEN'
                ], 401);
            }

            // Gọi NKS API để refresh token
            $response = $user->callNksApi('https://account.nks.vn/api/nks/auth/refresh', [], 'POST');

            if ($response->successful()) {
                $nksData = $response->json();
                $newToken = $nksData['data']['access_token'] ?? null;

                if ($newToken) {
                    $user->update(['nks_access_token' => $newToken]);

                    return response()->json([
                        'success' => true,
                        'data' => [
                            'access_token' => $newToken,
                            'token_type' => 'Bearer',
                        ],
                        'message' => 'Token làm mới thành công'
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Không thể làm mới token từ NKS',
                'error_code' => 'REFRESH_TOKEN_FAILED'
            ], 422);
        } catch (\Exception $e) {
            Log::error('Refresh token error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi làm mới token',
                'error_code' => 'REFRESH_TOKEN_ERROR'
            ], 500);
        }
    }

    /**
     * Change password through NKS
     */
    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        try {
            $user = User::find($request->user_id);

            if (!$user || !$user->hasValidNksToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User không tồn tại hoặc token đã hết hạn',
                    'error_code' => 'INVALID_USER_TOKEN'
                ], 401);
            }

            // Gọi NKS API để đổi password
            $response = $user->callNksApi('https://account.nks.vn/api/nks/user/change-password', [
                'current_password' => $request->current_password,
                'new_password' => $request->new_password,
                'new_password_confirmation' => $request->new_password_confirmation,
            ], 'POST');

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đổi mật khẩu thành công'
                ]);
            } else {
                $statusCode = $response->status();
                $errorMessage = $statusCode === 422 ? 'Mật khẩu hiện tại không đúng' : 'Không thể đổi mật khẩu';

                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'error_code' => 'CHANGE_PASSWORD_FAILED'
                ], min($statusCode, 422));
            }
        } catch (\Exception $e) {
            Log::error('Change password error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi đổi mật khẩu',
                'error_code' => 'CHANGE_PASSWORD_ERROR'
            ], 500);
        }
    }

    /**
     * Update NKS user info
     */
    public function nksUpdateUserInfo(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:20'],
        ]);

        try {
            $user = User::find($request->user_id);

            if (!$user || !$user->hasValidNksToken()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User không tồn tại hoặc token đã hết hạn',
                    'error_code' => 'INVALID_USER_TOKEN'
                ], 401);
            }

            // Gọi NKS API để cập nhật thông tin
            $updateData = array_filter([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            $response = $user->callNksApi('https://account.nks.vn/api/nks/user/update', $updateData, 'PUT');

            if ($response->successful()) {
                $nksData = $response->json();
                $updatedUser = $nksData['data']['user'] ?? [];

                // Cập nhật thông tin local
                if (!empty($updatedUser)) {
                    $user->update([
                        'name' => $updatedUser['name'] ?? $user->name,
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật thông tin thành công',
                    'data' => [
                        'user' => $user->makeHidden(['nks_access_token']),
                        'nks_user' => $updatedUser,
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể cập nhật thông tin',
                    'error_code' => 'UPDATE_USER_FAILED'
                ], 422);
            }
        } catch (\Exception $e) {
            Log::error('Update user info error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi cập nhật thông tin',
                'error_code' => 'UPDATE_USER_ERROR'
            ], 500);
        }
    }

    /**
     * Get location from IP address với caching và multiple providers
     */
    private function getLocationFromIP(string $ip): string
    {
        try {
            // Check for local/private IPs
            if (
                in_array($ip, ['127.0.0.1', '::1', 'localhost']) ||
                !filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
            ) {
                return 'Local/Private';
            }

            // Cache key for this IP
            $cacheKey = "location_ip_{$ip}";

            // Try to get from cache first (cache for 24 hours)
            $cachedLocation = Cache::get($cacheKey);
            if ($cachedLocation) {
                return $cachedLocation;
            }

            // Try multiple location providers
            $location = $this->tryLocationProviders($ip);

            // Cache the result
            if ($location !== 'Unknown') {
                Cache::put($cacheKey, $location, now()->addHours(24));
            }

            return $location;
        } catch (\Exception $e) {
            Log::debug('Location detection failed', [
                'ip' => $ip,
                'error' => $e->getMessage()
            ]);
            return 'Unknown';
        }
    }

    /**
     * Try multiple location service providers
     */
    private function tryLocationProviders(string $ip): string
    {
        $providers = [
            // Provider 1: ip-api.com
            [
                'url' => "http://ip-api.com/json/{$ip}?fields=status,country,regionName,city",
                'parser' => function ($data) {
                    if (isset($data['status']) && $data['status'] === 'success') {
                        $parts = array_filter([
                            $data['city'] ?? null,
                            $data['regionName'] ?? null,
                            $data['country'] ?? null
                        ]);
                        return implode(', ', array_slice($parts, 0, 2));
                    }
                    return null;
                }
            ],

            // Provider 2: ipapi.co
            [
                'url' => "https://ipapi.co/{$ip}/json/",
                'parser' => function ($data) {
                    if (!isset($data['error'])) {
                        $parts = array_filter([
                            $data['city'] ?? null,
                            $data['region'] ?? null,
                            $data['country_name'] ?? null
                        ]);
                        return implode(', ', array_slice($parts, 0, 2));
                    }
                    return null;
                }
            ]
        ];

        foreach ($providers as $provider) {
            try {
                $response = Http::timeout(3)->get($provider['url']);

                if ($response->successful()) {
                    $data = $response->json();
                    $location = $provider['parser']($data);

                    if ($location) {
                        Log::debug('Location detected', [
                            'ip' => $ip,
                            'location' => $location,
                            'provider' => $provider['url']
                        ]);
                        return $location;
                    }
                }
            } catch (\Exception $e) {
                Log::debug('Location provider failed', [
                    'ip' => $ip,
                    'provider' => $provider['url'],
                    'error' => $e->getMessage()
                ]);
                continue;
            }
        }

        return 'Unknown';
    }

    /**
     * Store Firebase token
     */
    private function storeFbToken(User $user, string $fbtoken, string $device): void
    {
        try {
            // Store in cache or database for future use
            Cache::put("fbtoken_user_{$user->id}_{$device}", $fbtoken, now()->addDays(7));

            Log::debug('Firebase token stored', [
                'user_id' => $user->id,
                'device' => $device,
                'token_length' => strlen($fbtoken)
            ]);
        } catch (\Exception $e) {
            Log::warning('Failed to store Firebase token', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Sync user role from NKS
     */
    private function syncUserRole(User $user, array $nksRole): void
    {
        try {
            $roleName = $nksRole['name'] ?? 'user';

            // If using Spatie Permission package
            if (method_exists($user, 'assignRole')) {
                $user->syncRoles([$roleName]);
                Log::debug('User role synced', [
                    'user_id' => $user->id,
                    'role' => $roleName
                ]);
            }
        } catch (\Exception $e) {
            Log::warning('Role sync failed', [
                'user_id' => $user->id,
                'nks_role' => $nksRole,
                'error' => $e->getMessage()
            ]);
        }
    }
}
