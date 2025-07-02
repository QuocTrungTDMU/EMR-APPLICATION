<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    private $nksApiUrl = 'https://account.nks.vn/api/nks';

    /**
     * Danh sách thông báo cho dropdown (popup)
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $user = $request->attributes->get('nks_user');
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User chưa đăng nhập',
                    'error_code' => 'UNAUTHENTICATED'
                ], 401);
            }
            $limit = $request->get('limit', 10);
            Log::info('=== DEBUGGING NOTIFICATION API ===', [
                'user_id' => $user['id'],
                'nks_user_id' => $user['nks_user_id'] ?? null,
                'limit' => $limit
            ]);

            // ✅ Gọi NKS API và log chi tiết
            $response = Http::timeout(30)->post($this->nksApiUrl . '/notifications', [
                'user_id' => $user['nks_user_id'] ?? $user['id']
            ]);

            // ✅ LOG RAW RESPONSE từ NKS
            Log::info('=== NKS RAW RESPONSE ===', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'raw_body' => $response->body(),
                'json_data' => $response->json()
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['data']) && is_array($data['data'])) {
                    // ✅ LOG NKS DATA trước khi process
                    Log::info('=== NKS DATA BEFORE PROCESSING ===', [
                        'original_count' => count($data['data']),
                        'original_ids' => collect($data['data'])->pluck('id')->toArray(),
                        'original_data' => $data['data']
                    ]);

                    // ✅ Áp dụng limit và log sau khi process
                    $limitedData = collect($data['data'])->take($limit);

                    Log::info('=== AFTER LIMIT APPLIED ===', [
                        'limit' => $limit,
                        'limited_count' => $limitedData->count(),
                        'limited_ids' => $limitedData->pluck('id')->toArray()
                    ]);

                    $notifications = $limitedData->map(function ($item) {
                        $processed = [
                            'id' => $item['id'], // ✅ Giữ nguyên ID từ NKS
                            'title' => $item['title'],
                            'body' => $item['body'],
                            'type' => $item['type'] ?? 'info',
                            'priority' => $item['priority'] ?? 'normal',
                            'created_at' => $item['created_at'],
                            'read_at' => $item['read_at'] ?? null,
                            'formatedCreatedDate' => $item['formatedCreatedDate'] ?? '',
                            'is_read' => !is_null($item['read_at'] ?? null),
                            'icon_class' => !is_null($item['read_at'] ?? null) ? 'bg-green-500' : 'bg-red-500',
                            'title_class' => !is_null($item['read_at'] ?? null) ? 'font-normal' : 'font-bold',
                            'data' => $item['data'] ?? null
                        ];

                        Log::info('=== PROCESSED ITEM ===', [
                            'original_id' => $item['id'],
                            'processed_id' => $processed['id'],
                            'title' => $processed['title']
                        ]);

                        return $processed;
                    });

                    $unreadCount = $notifications->where('is_read', false)->count();

                    // ✅ LOG FINAL RESULT
                    Log::info('=== FINAL RESULT ===', [
                        'final_count' => $notifications->count(),
                        'final_ids' => $notifications->pluck('id')->toArray(),
                        'unread_count' => $unreadCount
                    ]);

                    return response()->json([
                        'success' => true,
                        'option' => null,
                        'data' => $notifications->toArray(),
                        'unread_count' => $unreadCount,
                        'message' => 'Notifications retrieved successfully.',
                        'debug' => [
                            'nks_original_ids' => collect($data['data'])->pluck('id')->toArray(),
                            'processed_ids' => $notifications->pluck('id')->toArray(),
                            'user_id' => $user['id'],
                            'nks_user_id' => $user['nks_user_id'] ?? null,
                            'limit_applied' => $limit
                        ]
                    ]);
                }
            }

            // ✅ NKS API failed
            Log::error('=== NKS API FAILED ===', [
                'user_id' => $user['id'],
                'status' => $response->status(),
                'response_body' => $response->body(),
                'response_headers' => $response->headers()
            ]);

            return response()->json([
                'success' => true,
                'option' => null,
                'data' => [],
                'unread_count' => 0,
                'message' => 'No notifications available.',
                'debug' => [
                    'nks_api_failed' => true,
                    'status' => $response->status(),
                    'user_id' => $user['id']
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('=== EXCEPTION IN NOTIFICATION API ===', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $user['id'] ?? null
            ]);

            return response()->json([
                'success' => false,
                'data' => [],
                'unread_count' => 0,
                'message' => 'Không thể tải thông báo từ hệ thống',
                'error_code' => 'NKS_API_FAILED'
            ], 500);
        }
    }


    /**
     * Xem chi tiết thông báo - CHỈ từ NKS API
     */
    public function show($id, Request $request): JsonResponse
    {
        try {
            $user = $request->attributes->get('nks_user');
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User chưa đăng nhập',
                    'error_code' => 'UNAUTHENTICATED'
                ], 401);
            }

            Log::info('Loading notification detail from NKS API', [
                'user_id' => $user['id'],
                'notification_id' => $id,
                'nks_user_id' => $user['nks_user_id'] ?? null
            ]);

            // ✅ Fix: Gọi NKS API theo đúng format như Postman
            $nksUserId = $user['nks_user_id'] ?? $user['id'];

            // ✅ Method 1: GET with query params (như Postman)
            $response = Http::timeout(30)->get($this->nksApiUrl . '/notification', [
                'user_id' => $nksUserId,
                'id' => $id
            ]);

            // ✅ Log request details
            Log::info('NKS API request details', [
                'url' => $this->nksApiUrl . '/notification',
                'method' => 'GET',
                'params' => [
                    'user_id' => $nksUserId,
                    'id' => $id
                ],
                'full_url' => $this->nksApiUrl . '/notification?user_id=' . $nksUserId . '&id=' . $id
            ]);

            Log::info('NKS notification detail API response', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body' => $response->body(),
                'notification_id' => $id,
                'user_id' => $user['id']
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // ✅ NKS trả về data trực tiếp (không wrap trong 'notification')
                if (isset($data['data'])) {
                    $notification = $data['data'];
                } elseif (isset($data['title'])) {
                    // ✅ NKS trả về notification trực tiếp
                    $notification = $data;
                } else {
                    Log::warning('Unexpected NKS response format', [
                        'response_data' => $data
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'Unexpected response format from notification service.',
                        'error_code' => 'INVALID_NKS_RESPONSE'
                    ], 500);
                }

                // ✅ Process NKS data
                $enhancedNotification = [
                    'id' => $notification['id'] ?? $id,
                    'title' => $notification['title'] ?? 'No title',
                    'body' => $notification['body'] ?? 'No content',
                    'type' => $notification['type'] ?? 'info',
                    'priority' => $notification['priority'] ?? 'normal',
                    'created_at' => $notification['created_at'] ?? null,
                    'read_at' => $notification['read_at'] ?? null,
                    'formatedCreatedDate' => $notification['formatedCreatedDate'] ?? '',
                    'is_read' => !is_null($notification['read_at'] ?? null),
                    'icon_class' => !is_null($notification['read_at'] ?? null) ? 'bg-green-500' : 'bg-red-500',
                    'title_class' => !is_null($notification['read_at'] ?? null) ? 'font-normal' : 'font-bold',
                    'additional_data' => $notification['data'] ?? null,
                    'actions' => $notification['actions'] ?? []
                ];

                Log::info('Notification detail loaded successfully from NKS', [
                    'user_id' => $user['id'],
                    'notification_id' => $id,
                    'is_read' => $enhancedNotification['is_read']
                ]);

                return response()->json([
                    'success' => true,
                    'data' => $enhancedNotification,
                    'message' => 'Notification detail retrieved successfully.',
                    'debug' => [
                        'nks_url' => $this->nksApiUrl . '/notification?user_id=' . $nksUserId . '&id=' . $id,
                        'nks_response_keys' => array_keys($data),
                        'processed_notification' => $enhancedNotification
                    ]
                ]);
            }

            // ✅ NKS API failed - try POST method as fallback
            Log::warning('GET method failed, trying POST method', [
                'get_status' => $response->status(),
                'get_body' => $response->body()
            ]);

            $postResponse = Http::timeout(30)->post($this->nksApiUrl . '/notification', [
                'user_id' => $nksUserId,
                'id' => $id
            ]);

            Log::info('NKS POST method response', [
                'status' => $postResponse->status(),
                'body' => $postResponse->body()
            ]);

            if ($postResponse->successful()) {
                $data = $postResponse->json();

                // Process POST response similar to GET
                if (isset($data['notification'])) {
                    $notification = $data['notification'];
                } elseif (isset($data['data'])) {
                    $notification = $data['data'];
                } else {
                    $notification = $data;
                }

                $enhancedNotification = [
                    'id' => $notification['id'] ?? $id,
                    'title' => $notification['title'] ?? 'No title',
                    'body' => $notification['body'] ?? 'No content',
                    'type' => $notification['type'] ?? 'info',
                    'priority' => $notification['priority'] ?? 'normal',
                    'created_at' => $notification['created_at'] ?? null,
                    'read_at' => $notification['read_at'] ?? null,
                    'formatedCreatedDate' => $notification['formatedCreatedDate'] ?? '',
                    'is_read' => !is_null($notification['read_at'] ?? null),
                    'additional_data' => $notification['data'] ?? null
                ];

                return response()->json([
                    'success' => true,
                    'data' => $enhancedNotification,
                    'message' => 'Notification detail retrieved successfully.'
                ]);
            }

            // ✅ Both methods failed
            Log::error('Both GET and POST methods failed for NKS notification detail', [
                'user_id' => $user['id'],
                'notification_id' => $id,
                'get_status' => $response->status(),
                'post_status' => $postResponse->status(),
                'get_body' => $response->body(),
                'post_body' => $postResponse->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Notification not found in system.',
                'error_code' => 'NOTIFICATION_NOT_FOUND',
                'debug' => [
                    'tried_methods' => ['GET', 'POST'],
                    'get_status' => $response->status(),
                    'post_status' => $postResponse->status(),
                    'nks_user_id' => $nksUserId,
                    'requested_id' => $id
                ]
            ], 404);
        } catch (\Exception $e) {
            Log::error('NKS API notification show error', [
                'error' => $e->getMessage(),
                'user_id' => $user['id'] ?? null
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Không thể tải chi tiết thông báo từ hệ thống',
                'error_code' => 'NKS_DETAIL_API_FAILED'
            ], 500);
        }
    }

    /**
     * Đánh dấu thông báo đã đọc
     */
    public function markAsRead($id): JsonResponse
    {
        try {
            $user = $request->attributes->get('nks_user');

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User chưa đăng nhập',
                    'error_code' => 'UNAUTHENTICATED'
                ], 401);
            }

            Log::info('Marking notification as read via NKS API', [
                'user_id' => $user['id'],
                'notification_id' => $id
            ]);

            $response = Http::timeout(30)->post($this->nksApiUrl . '/notification/read', [
                'user_id' => $user['nks_user_id'] ?? $user['id'],
                'id' => $id
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Notification marked as read successfully via NKS', [
                    'user_id' => $user['id'],
                    'notification_id' => $id
                ]);

                return response()->json([
                    'success' => true,
                    'data' => [
                        'id' => $id,
                        'read_at' => now()->toISOString()
                    ],
                    'message' => 'Notification marked as read.'
                ]);
            }

            Log::warning('Failed to mark notification as read via NKS API', [
                'user_id' => $user['id'],
                'notification_id' => $id,
                'status' => $response->status(),
                'response_body' => $response->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to mark notification as read.',
                'error_code' => 'NKS_MARK_READ_FAILED'
            ], 500);
        } catch (\Exception $e) {
            Log::error('Failed to mark notification as read', [
                'error' => $e->getMessage(),
                'user_id' => $user['id'] ?? null,
                'notification_id' => $id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Không thể đánh dấu đã đọc',
                'error_code' => 'MARK_READ_FAILED'
            ], 500);
        }
    }

    /**
     * Xóa thông báo
     */
    public function destroy($id): JsonResponse
    {
        try {
            $user = $request->attributes->get('nks_user');

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User chưa đăng nhập',
                    'error_code' => 'UNAUTHENTICATED'
                ], 401);
            }

            Log::info('Deleting notification via NKS API', [
                'user_id' => $user['id'],
                'notification_id' => $id
            ]);

            $response = Http::timeout(30)->post($this->nksApiUrl . '/notification/delete', [
                'user_id' => $user['nks_user_id'] ?? $user['id'],
                'id' => $id
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Notification deleted successfully via NKS', [
                    'user_id' => $user['id'],
                    'notification_id' => $id
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Notification deleted successfully.'
                ]);
            }

            Log::warning('Failed to delete notification via NKS API', [
                'user_id' => $user['id'],
                'notification_id' => $id,
                'status' => $response->status(),
                'response_body' => $response->body()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete notification.',
                'error_code' => 'NKS_DELETE_FAILED'
            ], 500);
        } catch (\Exception $e) {
            Log::error('Failed to delete notification', [
                'error' => $e->getMessage(),
                'user_id' => $user['id'] ?? null,
                'notification_id' => $id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa thông báo',
                'error_code' => 'DELETE_NOTIFICATION_FAILED'
            ], 500);
        }
    }

    /**
     * Đánh dấu tất cả thông báo đã đọc
     */
    public function markAllAsRead(): JsonResponse
    {
        try {
            $user = $request->attributes->get('nks_user');

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User chưa đăng nhập',
                    'error_code' => 'UNAUTHENTICATED'
                ], 401);
            }

            Log::info('Marking all notifications as read via NKS API', [
                'user_id' => $user['id']
            ]);

            $response = Http::timeout(30)->post($this->nksApiUrl . '/notifications/read-all', [
                'user_id' => $user['nks_user_id'] ?? $user['id']
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $updatedCount = $data['updated_count'] ?? 0;

                Log::info('All notifications marked as read successfully via NKS', [
                    'user_id' => $user['id'],
                    'updated_count' => $updatedCount
                ]);

                return response()->json([
                    'success' => true,
                    'data' => [
                        'updated_count' => $updatedCount
                    ],
                    'message' => "Đã đánh dấu {$updatedCount} thông báo là đã đọc."
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to mark all notifications as read.',
                'error_code' => 'NKS_MARK_ALL_READ_FAILED'
            ], 500);
        } catch (\Exception $e) {
            Log::error('Failed to mark all notifications as read', [
                'error' => $e->getMessage(),
                'user_id' => $user['id'] ?? null
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Không thể đánh dấu tất cả đã đọc',
                'error_code' => 'MARK_ALL_READ_FAILED'
            ], 500);
        }
    }
}
