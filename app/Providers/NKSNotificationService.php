<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class NKSNotificationService
{
    private $baseUrl;
    private $timeout;

    public function __construct()
    {
        $this->baseUrl = 'https://account.nks.vn/api/nks';
        $this->timeout = 30;
    }

    /**
     * Lấy danh sách thông báo từ NKS API
     */
    public function getNotifications($userId, $limit = 10)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->post("{$this->baseUrl}/notifications", [
                    'user_id' => $userId
                ]);

            if ($response->successful()) {
                $data = $response->json();

                // Format lại data để phù hợp với frontend
                if (isset($data['data']) && is_array($data['data'])) {
                    $notifications = collect($data['data'])->take($limit)->map(function ($item) {
                        return [
                            'id' => $item['id'],
                            'title' => $item['title'],
                            'body' => $item['body'],
                            'created_at' => $item['created_at'],
                            'read_at' => $item['read_at'] ?? null,
                            'formatedCreatedDate' => $item['formatedCreatedDate'],
                            'is_read' => !is_null($item['read_at'] ?? null),
                            'icon_class' => !is_null($item['read_at'] ?? null) ? 'text-green-500' : 'text-red-500',
                            'title_class' => !is_null($item['read_at'] ?? null) ? 'font-normal' : 'font-bold'
                        ];
                    });

                    $unreadCount = $notifications->where('is_read', false)->count();

                    return [
                        'success' => true,
                        'data' => $notifications->toArray(),
                        'unread_count' => $unreadCount,
                        'message' => 'Notifications retrieved successfully.'
                    ];
                }
            }

            return [
                'success' => false,
                'data' => [],
                'unread_count' => 0,
                'message' => 'Failed to fetch notifications from NKS API.'
            ];
        } catch (\Exception $e) {
            Log::error('NKS Notifications API Error', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'data' => [],
                'unread_count' => 0,
                'message' => 'Unable to connect to notification service.'
            ];
        }
    }

    /**
     * Lấy chi tiết thông báo từ NKS API
     */
    public function getNotificationDetail($userId, $notificationId)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->post("{$this->baseUrl}/notification", [
                    'user_id' => $userId,
                    'id' => $notificationId
                ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['notification'])) {
                    $notification = $data['notification'];

                    return [
                        'success' => true,
                        'data' => [
                            'id' => $notification['id'],
                            'title' => $notification['title'],
                            'body' => $notification['body'],
                            'created_at' => $notification['created_at'],
                            'read_at' => $notification['read_at'] ?? null,
                            'formatedCreatedDate' => $notification['formatedCreatedDate'] ?? '',
                            'is_read' => !is_null($notification['read_at'] ?? null)
                        ],
                        'message' => 'Notification detail retrieved successfully.'
                    ];
                }
            }

            return [
                'success' => false,
                'message' => 'Notification not found.'
            ];
        } catch (\Exception $e) {
            Log::error('NKS Notification Detail API Error', [
                'user_id' => $userId,
                'notification_id' => $notificationId,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'Unable to fetch notification detail.'
            ];
        }
    }

    /**
     * Xóa thông báo qua NKS API
     */
    public function deleteNotification($userId, $notificationId)
    {
        try {
            $response = Http::timeout($this->timeout)
                ->post("{$this->baseUrl}/notification/delete", [
                    'user_id' => $userId,
                    'id' => $notificationId
                ]);

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'success' => true,
                    'message' => 'Notification deleted successfully.'
                ];
            }

            return [
                'success' => false,
                'message' => 'Failed to delete notification.'
            ];
        } catch (\Exception $e) {
            Log::error('NKS Delete Notification API Error', [
                'user_id' => $userId,
                'notification_id' => $notificationId,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'Unable to delete notification.'
            ];
        }
    }
}
