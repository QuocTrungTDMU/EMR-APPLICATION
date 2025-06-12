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

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_login_ip' => $realIP,
                'last_device' => $request->device ?? 'Web',
                'email_verified_at' => null, // Require email verification
            ]);

            event(new Registered($user));

            // Create token
            $tokenName = sprintf('reg_%s_%s', $request->device ?? 'web', now()->format('YmdHis'));
            $token = $user->createToken($tokenName)->plainTextToken;

            DB::commit();

            Log::info('User registration successful', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công. Vui lòng kiểm tra email để xác thực tài khoản.',
                'data' => [
                    'user' => $user->makeHidden(['password']),
                    'access_token' => $token,
                    'token_type' => 'Bearer',
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
     * Login with Laravel authentication
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'fbtoken' => ['sometimes', 'string'],
            'device' => ['sometimes', 'string', 'max:50'],
            'remember' => ['sometimes', 'boolean'],
        ]);

        $realIP = IpHelper::getRealClientIP($request);
        $ipInfo = IpHelper::getDetailedIPInfo($request);

        // Enhanced logging
        Log::info('Login attempt', [
            'email' => $request->email,
            'real_ip' => $realIP,
            'ip_info' => $ipInfo,
            'user_agent' => $request->userAgent(),
            'has_fbtoken' => !empty($request->fbtoken),
            'fbtoken_length' => strlen($request->fbtoken ?? ''),
            'device' => $request->device ?? 'Unknown'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            Log::warning('Failed login attempt', [
                'email' => $request->email,
                'real_ip' => $realIP,
                'user_agent' => $request->userAgent()
            ]);

            throw ValidationException::withMessages([
                'email' => ['Thông tin đăng nhập không chính xác.'],
            ]);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Check if user is active
        if (isset($user->active) && !$user->active) {
            Auth::logout();
            Log::warning('Inactive user login attempt', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Tài khoản đã bị vô hiệu hóa. Vui lòng liên hệ hỗ trợ.',
                'error_code' => 'ACCOUNT_DISABLED'
            ], 403);
        }

        // Check email verification if required
        if (!$user->hasVerifiedEmail()) {
            Log::warning('Unverified email login attempt', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Vui lòng xác thực email trước khi đăng nhập.',
                'error_code' => 'EMAIL_NOT_VERIFIED'
            ], 403);
        }

        // Revoke old tokens if not remember me
        if (!$request->boolean('remember')) {
            $user->tokens()->delete();
        }

        // Create new token with expiration
        $tokenName = sprintf('auth_%s_%s', $request->device ?? 'web', now()->format('YmdHis'));
        $expiresAt = $request->boolean('remember') ? now()->addDays(30) : now()->addHours(24);

        $token = $user->createToken($tokenName, ['*'], $expiresAt)->plainTextToken;

        // Update last login info with real IP
        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $realIP,
            'last_device' => $request->device ?? 'Web',
        ]);

        // Store Firebase token if provided
        if ($request->fbtoken) {
            $this->storeFbToken($user, $request->fbtoken, $request->device ?? 'Web');
        }

        Log::info('Successful login', [
            'user_id' => $user->id,
            'device' => $request->device ?? 'Web',
            'real_ip' => $realIP
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Đăng nhập thành công',
            'data' => [
                'user' => $user->makeHidden(['nks_access_token', 'password']),
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => $expiresAt->toISOString(),
                'permissions' => method_exists($user, 'getAllPermissions') ?
                    $user->getAllPermissions()->pluck('name') : [],
            ]
        ]);
    }

    /**
     * Login with NKS API and Firebase integration
     */
    public function nksLogin(Request $request): JsonResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'fbtoken' => ['sometimes', 'string'],
            'system' => ['sometimes', 'string', 'max:50'],
            'device' => ['sometimes', 'string', 'max:50'],
            'ip_address' => ['sometimes', 'ip'],
            'location' => ['sometimes', 'string', 'max:100'],
        ]);

        $realIP = IpHelper::getRealClientIP($request);
        $ipInfo = IpHelper::getDetailedIPInfo($request);

        // Enhanced logging
        Log::info('NKS Login attempt', [
            'username' => $request->username,
            'real_ip' => $realIP,
            'ip_info' => $ipInfo,
            'device' => $request->device ?? 'Web',
            'has_fbtoken' => !empty($request->fbtoken),
            'fbtoken_length' => strlen($request->fbtoken ?? ''),
            'user_agent' => $request->userAgent()
        ]);

        try {
            // Get location from real IP
            $location = $request->location ?? $this->getLocationFromIP($realIP);

            // Prepare NKS API payload
            $nksPayload = [
                'username' => $request->username,
                'password' => $request->password,
                'fbtoken' => $request->fbtoken ?? '',
                'system' => $request->system ?? 'Medik',
                'device' => $request->device ?? 'Web',
                'ip_address' => $realIP, // Use real IP
                'location' => $location,
            ];

            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'Medik-Laravel/1.0',
                ])
                ->post('https://account.nks.vn/api/nks/user/login', $nksPayload);

            Log::info('NKS API Response Details', [
                'status' => $response->status(),
                'successful' => $response->successful(),
                'headers' => $response->headers(),
                'body_preview' => substr($response->body(), 0, 500)
            ]);

            if ($response->successful()) {
                $nksData = $response->json();

                // Validate NKS response structure
                if (!isset($nksData['success']) || $nksData['success'] !== true) {
                    Log::error('NKS login failed - API returned success false', [
                        'response' => $nksData,
                        'username' => $request->username
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => $nksData['message'] ?? 'Đăng nhập NKS thất bại',
                        'error_code' => 'NKS_LOGIN_FAILED'
                    ], 422);
                }

                // Extract data from NKS response
                $responseData = $nksData['data'] ?? [];
                $nksUser = $responseData['user'] ?? [];
                $nksAccessToken = $responseData['access_token'] ?? null;
                $nksExpiresAt = $responseData['expires_at'] ?? null;

                // Validate required fields
                if (!$nksAccessToken) {
                    Log::error('NKS response missing access token', [
                        'response_keys' => array_keys($responseData),
                        'username' => $request->username
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'Phản hồi không hợp lệ từ NKS API - thiếu access token',
                        'error_code' => 'MISSING_ACCESS_TOKEN'
                    ], 422);
                }

                // Database transaction
                DB::beginTransaction();
                try {
                    // Create or update local user
                    $user = User::updateOrCreate(
                        ['email' => $request->username],
                        [
                            'name' => $nksUser['name'] ?? 'NKS User',
                            'password' => Hash::make($request->password),
                            'nks_user_id' => $nksUser['id'] ?? null,
                            'nks_access_token' => $nksAccessToken,
                            'email_verified_at' => now(),
                            'last_login_at' => now(),
                            'last_login_ip' => $realIP, // Use real IP
                            'last_device' => $request->device ?? 'Web',
                            // Sync additional NKS user data
                            'phone' => $nksUser['phone'] ?? ($user->phone ?? null),
                            'avatar' => $nksUser['avatar'] ?? ($user->avatar ?? null),
                        ]
                    );

                    // Revoke old tokens
                    $user->tokens()->delete();

                    // Create new Laravel token
                    $tokenName = sprintf('nks_%s_%s', $request->device ?? 'web', now()->format('YmdHis'));
                    $laravelToken = $user->createToken($tokenName)->plainTextToken;

                    // Store Firebase token if provided
                    if ($request->fbtoken) {
                        $this->storeFbToken($user, $request->fbtoken, $request->device ?? 'Web');
                    }

                    // Sync user roles/permissions if needed
                    if (isset($nksUser['role']['name'])) {
                        $this->syncUserRole($user, $nksUser['role']);
                    }

                    DB::commit();

                    Log::info('NKS login successful', [
                        'user_id' => $user->id,
                        'nks_user_id' => $user->nks_user_id,
                        'role' => $nksUser['role']['name'] ?? 'unknown',
                        'real_ip' => $realIP
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Đăng nhập NKS thành công',
                        'data' => [
                            'user' => $user->makeHidden(['nks_access_token', 'password']),
                            'access_token' => $laravelToken,
                            'token_type' => 'Bearer',
                            'nks_data' => [
                                'user' => $nksUser,
                                'access_token' => $nksAccessToken,
                                'expires_at' => $nksExpiresAt,
                                'message' => $nksData['message'] ?? null
                            ],
                            'permissions' => method_exists($user, 'getAllPermissions') ?
                                $user->getAllPermissions()->pluck('name') : [],
                            'location' => $location,
                        ]
                    ]);
                } catch (\Exception $dbError) {
                    DB::rollback();
                    Log::error('Database error during NKS login', [
                        'error' => $dbError->getMessage(),
                        'trace' => $dbError->getTraceAsString(),
                        'username' => $request->username
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'Không thể tạo tài khoản người dùng',
                        'error_code' => 'DATABASE_ERROR'
                    ], 500);
                }
            } else {
                // Handle specific HTTP error codes
                $statusCode = $response->status();
                $errorBody = $response->json() ?? [];

                Log::warning('NKS API returned error status', [
                    'status' => $statusCode,
                    'body' => $errorBody,
                    'username' => $request->username
                ]);

                $errorMessage = match ($statusCode) {
                    401 => 'Tên đăng nhập hoặc mật khẩu không chính xác',
                    403 => 'Tài khoản đã bị khóa hoặc không có quyền truy cập',
                    429 => 'Quá nhiều lần thử đăng nhập. Vui lòng thử lại sau',
                    500, 502, 503 => 'Máy chủ NKS đang bảo trì. Vui lòng thử lại sau',
                    default => 'Đăng nhập NKS thất bại'
                };

                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'error_code' => 'NKS_API_ERROR',
                    'status_code' => $statusCode
                ], min($statusCode, 422));
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('NKS API connection timeout', [
                'error' => $e->getMessage(),
                'username' => $request->username,
                'timeout' => 30
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Không thể kết nối đến máy chủ NKS. Vui lòng kiểm tra kết nối mạng và thử lại.',
                'error_code' => 'CONNECTION_TIMEOUT'
            ], 503);
        } catch (\Exception $e) {
            Log::error('Unexpected error during NKS login', [
                'error' => $e->getMessage(),
                'username' => $request->username,
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi không mong muốn. Vui lòng thử lại.',
                'error_code' => 'UNEXPECTED_ERROR'
            ], 500);
        }
    }

    /**
     * Get NKS user info
     */
    public function nksUserInfo(Request $request): JsonResponse
    {
        try {
            /** @var \App\Models\User $user */
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $nksToken = $user->nks_access_token;

            if (!$nksToken) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy NKS token. Vui lòng đăng nhập lại.',
                    'error_code' => 'NO_NKS_TOKEN'
                ], 400);
            }

            // Call NKS API
            $response = Http::retry(2, 1000)
                ->timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $nksToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://account.nks.vn/api/nks/user', [
                    'access_token' => $nksToken
                ]);

            if ($response->successful()) {
                $nksData = $response->json();

                // Check NKS response structure
                if (!isset($nksData['success']) || $nksData['success'] !== true) {
                    return response()->json([
                        'success' => false,
                        'message' => 'NKS API trả về lỗi',
                        'error' => $nksData
                    ], 422);
                }

                // Extract user data
                $nksUserData = $nksData['data']['user'] ?? $nksData['data'] ?? null;

                if ($nksUserData) {
                    // Update local user data if needed
                    if (isset($nksUserData['name']) && $nksUserData['name'] !== $user->name) {
                        $user->update(['name' => $nksUserData['name']]);
                    }
                }

                return response()->json([
                    'success' => true,
                    'data' => [
                        'local_user' => $user->makeHidden(['nks_access_token', 'password']),
                        'nks_user' => $nksUserData,
                        'nks_expires_at' => $nksData['data']['expires_at'] ?? null
                    ],
                    'message' => $nksData['message'] ?? 'Lấy thông tin người dùng thành công'
                ]);
            } else {
                $statusCode = $response->status();

                // Handle token expiry
                if ($statusCode === 401) {
                    $user->update(['nks_access_token' => null]);
                    return response()->json([
                        'success' => false,
                        'message' => 'NKS token đã hết hạn. Vui lòng đăng nhập lại.',
                        'error_code' => 'NKS_TOKEN_EXPIRED'
                    ], 401);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Không thể lấy thông tin từ NKS',
                    'error_code' => 'NKS_API_ERROR',
                    'status_code' => $statusCode
                ], min($statusCode, 422));
            }
        } catch (\Exception $e) {
            Log::error('NKS User Info Error', [
                'error' => $e->getMessage(),
                'user_id' => $request->user()?->id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi kết nối NKS API',
                'error_code' => 'NKS_CONNECTION_ERROR'
            ], 500);
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        Log::info('User logout', [
            'user_id' => $user?->id,
            'device' => $request->device ?? 'Unknown'
        ]);

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đăng xuất thành công'
        ]);
    }

    /**
     * Logout from all devices
     */
    public function logoutAll(Request $request): JsonResponse
    {
        $user = $request->user();

        Log::info('User logout all devices', [
            'user_id' => $user?->id,
            'tokens_count' => $user?->tokens()->count() ?? 0
        ]);

        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đăng xuất khỏi tất cả thiết bị thành công'
        ]);
    }

    /**
     * Get authenticated user info
     */
    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user->makeHidden(['nks_access_token', 'password']),
                'permissions' => method_exists($user, 'getAllPermissions') ?
                    $user->getAllPermissions()->pluck('name') : [],
            ]
        ]);
    }

    /**
     * Refresh token
     */
    public function refreshToken(Request $request): JsonResponse
    {
        $user = $request->user();
        $currentToken = $request->user()->currentAccessToken();

        // Delete current token
        $currentToken->delete();

        // Create new token
        $tokenName = sprintf('refresh_%s_%s', $request->device ?? 'web', now()->format('YmdHis'));
        $token = $user->createToken($tokenName)->plainTextToken;

        Log::info('Token refreshed', [
            'user_id' => $user->id,
            'old_token_name' => $currentToken->name
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
            'message' => 'Token làm mới thành công'
        ]);
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
