<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('app.url') . '/api';
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
            'verify' => false, // Disable SSL verification for local development
        ]);
    }

    /**
     * Get headers for API requests
     */
    private function getHeaders(Request $request = null): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if ($request) {
            // Add CSRF token
            $headers['X-CSRF-TOKEN'] = csrf_token();

            // Add session cookies for authentication
            if ($request->hasSession()) {
                $sessionName = config('session.cookie');
                $sessionValue = $request->session()->getId();
                $headers['Cookie'] = "{$sessionName}={$sessionValue}";

                // Add Laravel session cookie
                $laravelSession = $request->cookie('laravel_session');
                if ($laravelSession) {
                    $headers['Cookie'] = "laravel_session={$laravelSession}";
                }
            }

            // Alternative: Add Authorization header if using token
            if ($request->bearerToken()) {
                $headers['Authorization'] = 'Bearer ' . $request->bearerToken();
            }
        }

        return $headers;
    }

    /**
     * Get user information
     */
    public function getUserInfo(Request $request): array
    {
        try {
            $response = $this->client->get('/nks-user-info', [
                'headers' => $this->getHeaders($request),
                'cookies' => $this->getCookieJar($request),
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return [
                'success' => true,
                'data' => $data['data'] ?? [],
                'message' => $data['message'] ?? 'Lấy thông tin thành công'
            ];
        } catch (RequestException $e) {
            Log::error('API Error - Get User Info: ' . $e->getMessage());

            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorData = json_decode($e->getResponse()->getBody()->getContents(), true);

                return [
                    'success' => false,
                    'message' => $errorData['message'] ?? 'Lỗi khi lấy thông tin người dùng',
                    'errors' => $errorData['errors'] ?? [],
                    'status_code' => $statusCode
                ];
            }

            return [
                'success' => false,
                'message' => 'Không thể kết nối đến API'
            ];
        }
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request, array $data): array
    {
        try {
            $response = $this->client->patch('/profile/update', [
                'headers' => $this->getHeaders($request),
                'cookies' => $this->getCookieJar($request),
                'json' => $data
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);

            return [
                'success' => true,
                'data' => $responseData['data'] ?? [],
                'message' => $responseData['message'] ?? 'Cập nhật thông tin thành công'
            ];
        } catch (RequestException $e) {
            Log::error('API Error - Update Profile: ' . $e->getMessage());

            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorData = json_decode($e->getResponse()->getBody()->getContents(), true);

                return [
                    'success' => false,
                    'message' => $errorData['message'] ?? 'Lỗi khi cập nhật thông tin',
                    'errors' => $errorData['errors'] ?? [],
                    'status_code' => $statusCode
                ];
            }

            return [
                'success' => false,
                'message' => 'Không thể kết nối đến API'
            ];
        }
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request, array $data): array
    {
        try {
            $response = $this->client->patch('/profile/password', [
                'headers' => $this->getHeaders($request),
                'cookies' => $this->getCookieJar($request),
                'json' => $data
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);

            return [
                'success' => true,
                'message' => $responseData['message'] ?? 'Cập nhật mật khẩu thành công'
            ];
        } catch (RequestException $e) {
            Log::error('API Error - Update Password: ' . $e->getMessage());

            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorData = json_decode($e->getResponse()->getBody()->getContents(), true);

                return [
                    'success' => false,
                    'message' => $errorData['message'] ?? 'Lỗi khi cập nhật mật khẩu',
                    'errors' => $errorData['errors'] ?? [],
                    'status_code' => $statusCode
                ];
            }

            return [
                'success' => false,
                'message' => 'Không thể kết nối đến API'
            ];
        }
    }

    /**
     * Delete user account
     */
    public function deleteAccount(Request $request, string $password): array
    {
        try {
            $response = $this->client->delete('/profile/delete', [
                'headers' => $this->getHeaders($request),
                'cookies' => $this->getCookieJar($request),
                'json' => ['password' => $password]
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);

            return [
                'success' => true,
                'message' => $responseData['message'] ?? 'Xóa tài khoản thành công'
            ];
        } catch (RequestException $e) {
            Log::error('API Error - Delete Account: ' . $e->getMessage());

            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorData = json_decode($e->getResponse()->getBody()->getContents(), true);

                return [
                    'success' => false,
                    'message' => $errorData['message'] ?? 'Lỗi khi xóa tài khoản',
                    'errors' => $errorData['errors'] ?? [],
                    'status_code' => $statusCode
                ];
            }

            return [
                'success' => false,
                'message' => 'Không thể kết nối đến API'
            ];
        }
    }

    /**
     * Get cookie jar for requests
     */
    private function getCookieJar(Request $request)
    {
        $jar = new \GuzzleHttp\Cookie\CookieJar();

        // Add all cookies from the request
        foreach ($request->cookies as $name => $value) {
            $jar->setCookie(new \GuzzleHttp\Cookie\SetCookie([
                'Name' => $name,
                'Value' => $value,
                'Domain' => $request->getHost(),
            ]));
        }

        return $jar;
    }
}
