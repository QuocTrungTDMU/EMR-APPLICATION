<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\IpHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * ✅ PRIVATE: Clear only auth-related session data (NOT all session)
     */
    private function clearAuthSessionData(Request $request): void
    {
        $keysToForget = [
            'user_id',
            'user_name',
            'user_email',
            'nks_user_id',
            'nks_access_token',
            'nks_expires_at',
            'nks_user_data',
            'user_last_login_at',
            'user_last_login_ip',
            'user_status',
            'is_authenticated',
            'session_created_at',
            'session_expires_at',
            'login_timestamp',
            'session_persistent'
        ];

        foreach ($keysToForget as $key) {
            $request->session()->forget($key);
        }
    }

    /**
     * ✅ PRIVATE: Set persistent session cookie manually
     */
    private function setPersistentCookie(Request $request): void
    {
        $cookieName = config('session.cookie');
        $sessionId = $request->session()->getId();

        // Force set cookie với lifetime dài
        cookie()->queue(
            $cookieName,
            $sessionId,
            2880, // 48 hours
            config('session.path', '/'),
            config('session.domain'),
            config('session.secure', false),
            config('session.http_only', true),
            false, // raw
            config('session.same_site', 'lax')
        );
    }

    /**
     * ✅ PRIVATE: Check valid NKS token in session
     */
    private function hasValidNksTokenInSession(Request $request): bool
    {
        $token = $request->session()->get('nks_access_token');
        $expiresAt = $request->session()->get('nks_expires_at');

        if (!$token) {
            return false;
        }

        if ($expiresAt && Carbon::parse($expiresAt)->isPast()) {
            // Token expired, clear auth data only
            $this->clearAuthSessionData($request);
            return false;
        }

        return true;
    }

    /**
     * ✅ PRIVATE: Get NKS token from session
     */
    private function getNksTokenFromSession(Request $request): ?string
    {
        return $this->hasValidNksTokenInSession($request)
            ? $request->session()->get('nks_access_token')
            : null;
    }

    /**
     * ✅ PRIVATE: Call NKS API with session token
     */
    private function callNksApiWithSessionToken(Request $request, string $url, array $data = [], string $method = 'GET')
    {
        $token = $this->getNksTokenFromSession($request);

        if (!$token) {
            throw new \Exception('No valid NKS token in session');
        }

        return Http::timeout(30)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])
            ->send($method, $url, $data);
    }

    /**
     * ✅ WEB + API LOGIN - COMPLETELY FIXED SESSION PERSISTENCE
     */
    public function nksLogin(Request $request)
    {
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

        Log::info('🔐 NKS Login attempt', [
            'email' => $request->email,
            'real_ip' => $realIP,
            'is_ajax' => $request->expectsJson(),
            'session_id_before' => $request->session()->getId(),
            'user_agent' => $request->header('User-Agent'),
            'timestamp' => now()->toISOString()
        ]);

        try {
            // ✅ Call NKS API for authentication
            $response = Http::timeout(30)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://account.nks.vn/api/nks/user/login', [
                    'username' => $request->email,
                    'password' => $request->password,
                ]);

            if (!$response->successful()) {
                $statusCode = $response->status();

                Log::warning('❌ NKS API authentication failed', [
                    'email' => $request->email,
                    'status' => $statusCode,
                    'response_body' => $response->body(),
                    'session_id' => $request->session()->getId()
                ]);

                $errorMessage = match ($statusCode) {
                    401 => 'Email hoặc mật khẩu không chính xác',
                    403 => 'Tài khoản đã bị khóa',
                    404 => 'Tài khoản không tồn tại trong hệ thống NKS',
                    429 => 'Vui lòng thử lại sau ít phút',
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
                    return back()
                        ->withErrors(['email' => $errorMessage])
                        ->withInput($request->except('password'));
                }
            }

            $nksData = $response->json();

            if (!isset($nksData['success']) || $nksData['success'] !== true) {
                Log::error('❌ NKS API returned invalid response', [
                    'email' => $request->email,
                    'response' => $nksData,
                    'session_id' => $request->session()->getId()
                ]);

                $message = 'Phản hồi không hợp lệ từ NKS';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_INVALID_RESPONSE'
                    ], 422);
                } else {
                    return back()
                        ->withErrors(['email' => $message])
                        ->withInput($request->except('password'));
                }
            }

            // ✅ Extract data from NKS response
            $responseData = $nksData['data'] ?? [];
            $nksUser = $responseData['user'] ?? [];
            $nksAccessToken = $responseData['access_token'] ?? null;
            $expiresAt = $responseData['expires_at'] ?? null;

            if (!$nksAccessToken || empty($nksUser)) {
                Log::error('❌ NKS response missing required data', [
                    'email' => $request->email,
                    'has_token' => !empty($nksAccessToken),
                    'has_user' => !empty($nksUser),
                    'response_data' => $responseData
                ]);

                $message = 'Dữ liệu xác thực từ NKS không đầy đủ';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_INCOMPLETE_DATA'
                    ], 422);
                } else {
                    return back()
                        ->withErrors(['email' => $message])
                        ->withInput($request->except('password'));
                }
            }

            if (isset($nksUser['active']) && !$nksUser['active']) {
                Log::warning('⚠️ NKS user account is not active', [
                    'email' => $request->email,
                    'nks_user_id' => $nksUser['id'] ?? null,
                    'user_status' => $nksUser['active'] ?? 'unknown'
                ]);

                $message = 'Tài khoản đã bị vô hiệu hóa trong hệ thống NKS';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'NKS_ACCOUNT_INACTIVE'
                    ], 403);
                } else {
                    return back()
                        ->withErrors(['email' => $message])
                        ->withInput($request->except('password'));
                }
            }

            try {
                // ✅ CRITICAL: NO SESSION REGENERATION - Key fix for F5 issue
                $originalSessionId = $request->session()->getId();

                Log::info('🔄 Starting session setup', [
                    'session_id' => $originalSessionId,
                    'email' => $request->email,
                    'nks_user_id' => $nksUser['id'] ?? null
                ]);

                // ✅ Clear only auth data, preserve other session data  
                $authKeysToForget = [
                    'user_id',
                    'user_name',
                    'user_email',
                    'nks_user_id',
                    'nks_access_token',
                    'nks_expires_at',
                    'nks_user_data',
                    'user_last_login_at',
                    'user_last_login_ip',
                    'user_status',
                    'is_authenticated',
                    'session_created_at',
                    'session_persistent',
                    'login_timestamp',
                    'session_expires_at'
                ];

                foreach ($authKeysToForget as $key) {
                    $request->session()->forget($key);
                }

                $sessionUserId = 'nks_' . ($nksUser['id'] ?? uniqid()) . '_' . time();
                $userName = $nksUser['name'] ?? 'NKS User';
                $userRole = $nksUser['role']['name'] ?? 'User';

                // ✅ ATOMIC SESSION DATA WRITE - All data at once
                $sessionData = [
                    'user_id' => $sessionUserId,
                    'user_name' => $userName, // ✅ Ensure NOT null
                    'user_email' => $request->email,
                    'nks_user_id' => $nksUser['id'] ?? null,
                    'nks_access_token' => $nksAccessToken,
                    'nks_expires_at' => $expiresAt,
                    'nks_user_data' => $nksUser,
                    'user_last_login_at' => now()->toISOString(),
                    'user_last_login_ip' => $realIP,
                    'user_status' => 'active',
                    'is_authenticated' => true,
                    'session_created_at' => now()->toISOString(),
                    'session_persistent' => true,
                    'login_timestamp' => now()->timestamp,
                    'session_expires_at' => now()->addMinutes(2880)->toISOString(), // 48 hours
                    'login_method' => 'nks_api',
                    'user_role' => $userRole
                ];

                // ✅ ENHANCED LOGGING BEFORE WRITE
                Log::info('📝 Writing session data', [
                    'session_id' => $originalSessionId,
                    'user_name' => $userName,
                    'user_name_type' => gettype($userName),
                    'data_keys' => array_keys($sessionData),
                    'data_count' => count($sessionData)
                ]);

                // ✅ WRITE ALL DATA ATOMICALLY
                $request->session()->put($sessionData);

                // ✅ FORCE IMMEDIATE SAVE - Critical for persistence
                $request->session()->save();

                // ✅ MANUAL PERSISTENT COOKIE SETUP
                $cookieName = config('session.cookie');
                cookie()->queue(
                    $cookieName,
                    $originalSessionId,
                    2880, // 48 hours in minutes
                    config('session.path', '/'),
                    config('session.domain'),
                    config('session.secure', false),
                    config('session.http_only', true),
                    false, // raw cookie
                    config('session.same_site', 'lax')
                );

                // ✅ IMMEDIATE VERIFICATION
                $verifyAuth = $request->session()->get('is_authenticated');
                $verifyName = $request->session()->get('user_name');
                $verifySessionId = $request->session()->getId();

                if (!$verifyAuth || !$verifyName || $verifySessionId !== $originalSessionId) {
                    throw new \Exception('Session verification failed: auth=' . var_export($verifyAuth, true) . ', name=' . var_export($verifyName, true) . ', id_changed=' . ($verifySessionId !== $originalSessionId ? 'yes' : 'no'));
                }

                // ✅ ENHANCED SUCCESS LOGGING
                Log::info('✅ NKS login successful with persistent session', [
                    'session_user_id' => $sessionUserId,
                    'session_id' => $verifySessionId,
                    'user_name' => $verifyName,
                    'user_email' => $request->email,
                    'user_role' => $userRole,
                    'verified_auth' => $verifyAuth,
                    'session_persistent' => true,
                    'session_file_exists' => file_exists(storage_path('framework/sessions/' . $verifySessionId)),
                    'login_success_timestamp' => now()->toISOString()
                ]);

                $successMessage = "Chào mừng {$userName} ({$userRole}) đến với hệ thống NKS!";

                // ✅ Response based on request type
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => $successMessage,
                        'data' => [
                            'user' => [
                                'id' => $sessionUserId,
                                'name' => $userName,
                                'email' => $request->email,
                                'role' => $userRole,
                                'nks_user_id' => $nksUser['id'] ?? null,
                            ],
                            'redirect_url' => '/',
                            'session_stored' => true,
                            'session_id' => $verifySessionId,
                            'persistent' => true,
                            'expires_at' => now()->addMinutes(2880)->toISOString()
                        ]
                    ]);
                } else {
                    // ✅ WEB: Redirect to homepage với success message
                    return redirect('/')
                        ->with('login_success', $successMessage)
                        ->with('user_name', $userName)
                        ->with('user_role', $userRole)
                        ->with('login_timestamp', now()->toISOString());
                }
            } catch (\Exception $sessionError) {
                Log::error('💥 Session error during NKS login', [
                    'error' => $sessionError->getMessage(),
                    'email' => $request->email,
                    'session_id' => $request->session()->getId(),
                    'trace' => $sessionError->getTraceAsString(),
                    'session_data_before_error' => $request->session()->all()
                ]);

                $message = 'Không thể lưu thông tin đăng nhập: ' . $sessionError->getMessage();

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'error_code' => 'SESSION_ERROR',
                        'debug_info' => [
                            'session_id' => $request->session()->getId(),
                            'error_details' => $sessionError->getMessage()
                        ]
                    ], 500);
                } else {
                    return back()
                        ->withErrors(['email' => $message])
                        ->withInput($request->except('password'));
                }
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('🌐 NKS API connection failed', [
                'error' => $e->getMessage(),
                'email' => $request->email,
                'session_id' => $request->session()->getId(),
                'timeout' => 30
            ]);

            $message = 'Không thể kết nối đến hệ thống NKS. Vui lòng kiểm tra kết nối mạng.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'error_code' => 'NKS_CONNECTION_ERROR'
                ], 503);
            } else {
                return back()
                    ->withErrors(['email' => $message])
                    ->withInput($request->except('password'));
            }
        } catch (\Exception $e) {
            Log::error('💥 Unexpected error during NKS login', [
                'error' => $e->getMessage(),
                'email' => $request->email,
                'session_id' => $request->session()->getId(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except('password')
            ]);

            $message = 'Đã xảy ra lỗi không mong muốn. Vui lòng thử lại.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'error_code' => 'UNEXPECTED_ERROR',
                    'debug_session_id' => $request->session()->getId()
                ], 500);
            } else {
                return back()
                    ->withErrors(['email' => $message])
                    ->withInput($request->except('password'));
            }
        }
    }

    /**
     * ✅ WEB LOGOUT - FIXED COMPLETELY
     */
    public function webLogout(Request $request)
    {
        try {
            $userName = $request->session()->get('user_name', 'User');
            $userEmail = $request->session()->get('user_email');
            $sessionId = $request->session()->getId();

            Log::info('Starting logout process', [
                'user_name' => $userName,
                'email' => $userEmail,
                'session_id' => $sessionId,
                'ip' => IpHelper::getRealClientIP($request)
            ]);

            // ✅ Clear auth data first
            $this->clearAuthSessionData($request);

            // ✅ Complete logout sequence
            $request->session()->flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Log::info('Logout completed successfully', [
                'old_session_id' => $sessionId,
                'new_session_id' => $request->session()->getId(),
                'user_name' => $userName
            ]);

            return redirect('/')->with('logout_success', "Tạm biệt {$userName}! Bạn đã đăng xuất thành công.");
        } catch (\Exception $e) {
            Log::error('Logout error', ['error' => $e->getMessage()]);

            // Force clear on error
            try {
                $request->session()->flush();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            } catch (\Exception $clearError) {
                // Ignore clear errors
            }

            return redirect('/')->with('logout_success', 'Đã đăng xuất.');
        }
    }

    /**
     * ✅ API LOGOUT - FIXED
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $sessionUserId = $request->session()->get('user_id');
            $userEmail = $request->session()->get('user_email');
            $sessionId = $request->session()->getId();

            Log::info('API logout attempt', [
                'session_user_id' => $sessionUserId,
                'email' => $userEmail,
                'session_id' => $sessionId
            ]);

            $this->clearAuthSessionData($request);
            $request->session()->flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Log::info('API logout successful');

            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công'
            ]);
        } catch (\Exception $e) {
            Log::error('API logout error', ['error' => $e->getMessage()]);

            // Force clear
            try {
                $request->session()->flush();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            } catch (\Exception $clearError) {
                // Ignore
            }

            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công'
            ]);
        }
    }

    /**
     * ✅ Get user info from session
     */
    public function me(Request $request): JsonResponse
    {
        if (!$this->hasValidNksTokenInSession($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Session không hợp lệ hoặc đã hết hạn',
                'error_code' => 'INVALID_SESSION'
            ], 401);
        }

        try {
            $sessionData = [
                'user_id' => $request->session()->get('user_id'),
                'name' => $request->session()->get('user_name'),
                'email' => $request->session()->get('user_email'),
                'nks_user_id' => $request->session()->get('nks_user_id'),
                'last_login_at' => $request->session()->get('user_last_login_at'),
                'status' => $request->session()->get('user_status'),
                'is_authenticated' => $request->session()->get('is_authenticated'),
            ];

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $sessionData,
                    'nks_user_data' => $request->session()->get('nks_user_data'),
                    'token_expires_at' => $request->session()->get('nks_expires_at'),
                    'session_persistent' => $request->session()->get('session_persistent', false)
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Get user session error', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi lấy thông tin session',
                'error_code' => 'SESSION_ERROR'
            ], 500);
        }
    }

    /**
     * ✅ Check session status - FOR DEBUGGING
     */
    public function checkSession(Request $request): JsonResponse
    {
        $hasValidToken = $this->hasValidNksTokenInSession($request);

        return response()->json([
            'success' => true,
            'data' => [
                'has_valid_session' => $hasValidToken,
                'session_id' => $request->session()->getId(),
                'is_authenticated' => $request->session()->get('is_authenticated', false),
                'expires_at' => $hasValidToken ? $request->session()->get('nks_expires_at') : null,
                'user_id' => $request->session()->get('user_id'),
                'user_email' => $request->session()->get('user_email'),
                'session_persistent' => $request->session()->get('session_persistent', false),
                'login_timestamp' => $request->session()->get('login_timestamp'),
                'all_session_keys' => array_keys($request->session()->all()),
                'current_timestamp' => now()->timestamp
            ]
        ]);
    }

    /**
     * ✅ Refresh NKS token
     */
    public function refreshToken(Request $request): JsonResponse
    {
        if (!$this->hasValidNksTokenInSession($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Session không hợp lệ hoặc đã hết hạn',
                'error_code' => 'INVALID_SESSION'
            ], 401);
        }

        try {
            $response = $this->callNksApiWithSessionToken($request, 'https://account.nks.vn/api/nks/auth/refresh', [], 'POST');

            if ($response->successful()) {
                $nksData = $response->json();
                $newToken = $nksData['data']['access_token'] ?? null;
                $newExpiresAt = $nksData['data']['expires_at'] ?? null;

                if ($newToken) {
                    // Update new token in session
                    $request->session()->put([
                        'nks_access_token' => $newToken,
                        'nks_expires_at' => $newExpiresAt
                    ]);
                    $request->session()->save();

                    return response()->json([
                        'success' => true,
                        'data' => [
                            'access_token' => $newToken,
                            'token_type' => 'Bearer',
                            'expires_at' => $newExpiresAt
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
            Log::error('Refresh token error', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi làm mới token',
                'error_code' => 'REFRESH_TOKEN_ERROR'
            ], 500);
        }
    }

    /**
     * ✅ Get user info from NKS API
     */
    public function nksUserInfo(Request $request): JsonResponse
    {
        if (!$this->hasValidNksTokenInSession($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Token không tồn tại hoặc đã hết hạn trong session',
                'error_code' => 'INVALID_SESSION_TOKEN'
            ], 401);
        }

        try {
            $response = $this->callNksApiWithSessionToken($request, 'https://account.nks.vn/api/nks/user');

            if ($response->successful()) {
                $nksData = $response->json();

                return response()->json([
                    'success' => true,
                    'data' => [
                        'session_user' => [
                            'id' => $request->session()->get('user_id'),
                            'name' => $request->session()->get('user_name'),
                            'email' => $request->session()->get('user_email'),
                            'nks_user_id' => $request->session()->get('nks_user_id'),
                        ],
                        'nks_user' => $nksData['data'] ?? $nksData,
                    ]
                ]);
            } else {
                if ($response->status() === 401) {
                    // Token invalid, clear auth data
                    $this->clearAuthSessionData($request);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Không thể lấy thông tin từ NKS',
                    'error_code' => 'NKS_API_ERROR'
                ], 422);
            }
        } catch (\Exception $e) {
            Log::error('Get user info error', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi lấy thông tin user',
                'error_code' => 'GET_USER_ERROR'
            ], 500);
        }
    }

    /**
     * ✅ Login with existing token
     */
    public function loginWithToken(Request $request): JsonResponse
    {
        $request->validate([
            'access_token' => ['required', 'string'],
            'expires_at' => ['sometimes', 'string'],
        ]);

        try {
            // Verify token by calling NKS API
            $response = Http::timeout(30)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $request->access_token,
                ])
                ->get('https://account.nks.vn/api/nks/user');

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token không hợp lệ',
                    'error_code' => 'INVALID_TOKEN'
                ], 401);
            }

            $nksData = $response->json();
            $nksUser = $nksData['data'] ?? $nksData;

            // Clear old auth data and save to session
            $this->clearAuthSessionData($request);

            $sessionUserId = 'token_' . ($nksUser['id'] ?? uniqid()) . '_' . time();

            $sessionData = [
                'user_id' => $sessionUserId,
                'user_name' => $nksUser['name'] ?? 'NKS User',
                'user_email' => $nksUser['email'] ?? '',
                'nks_user_id' => $nksUser['id'] ?? null,
                'nks_access_token' => $request->access_token,
                'nks_expires_at' => $request->expires_at,
                'nks_user_data' => $nksUser,
                'user_last_login_at' => now()->toISOString(),
                'user_status' => 'active',
                'is_authenticated' => true,
                'session_persistent' => true,
                'login_timestamp' => now()->timestamp
            ];

            $request->session()->put($sessionData);
            $request->session()->save();
            $this->setPersistentCookie($request);

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập bằng token thành công',
                'data' => [
                    'user' => [
                        'id' => $sessionUserId,
                        'name' => $nksUser['name'] ?? 'NKS User',
                        'email' => $nksUser['email'] ?? '',
                        'nks_user_id' => $nksUser['id'] ?? null,
                    ],
                    'nks_user_data' => $nksUser,
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Login with token error', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi đăng nhập bằng token',
                'error_code' => 'TOKEN_LOGIN_ERROR'
            ], 500);
        }
    }
}
