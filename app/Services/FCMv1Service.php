<?php
// app/Services/FCMv1Service.php

namespace App\Services;

use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FCMv1Service
{
    private $projectId;
    private $serviceAccountPath;

    public function __construct()
    {
        $this->projectId = env('GOOGLE_PROJECT_ID');
        $this->serviceAccountPath = storage_path('app/' . env('GOOGLE_SERVICE_ACCOUNT_PATH'));
    }

    /**
     * Get OAuth 2.0 access token for FCM v1 API
     */
    private function getAccessToken(): string
    {
        $credential = new ServiceAccountCredentials(
            'https://www.googleapis.com/auth/firebase.messaging',
            json_decode(file_get_contents($this->serviceAccountPath), true)
        );

        $token = $credential->fetchAuthToken(HttpHandlerFactory::build());

        return $token['access_token'];
    }

    /**
     * Send notification using FCM v1 API
     */
    public function sendNotification(string $fcmToken, array $notification, array $data = []): bool
    {
        try {
            $accessToken = $this->getAccessToken();

            // FCM v1 API endpoint
            $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

            // FCM v1 message format
            $message = [
                'message' => [
                    'token' => $fcmToken,
                    'notification' => [
                        'title' => $notification['title'] ?? 'Notification',
                        'body' => $notification['body'] ?? 'You have a new message',
                    ],
                    'data' => $data,
                    'webpush' => [
                        'headers' => [
                            'Urgency' => 'high'
                        ],
                        'notification' => [
                            'title' => $notification['title'] ?? 'Notification',
                            'body' => $notification['body'] ?? 'You have a new message',
                            'icon' => '/favicon.ico',
                            'badge' => '/favicon.ico',
                            'requireInteraction' => true,
                        ]
                    ]
                ]
            ];

            // Send HTTP v1 request
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ])->post($url, $message);

            if ($response->successful()) {
                Log::info('FCM v1 notification sent successfully', [
                    'token' => substr($fcmToken, 0, 20) . '...',
                    'response' => $response->json()
                ]);
                return true;
            } else {
                Log::error('FCM v1 notification failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('FCM v1 service error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    /**
     * Store FCM token for user
     */
    public function storeUserToken(int $userId, string $fcmToken, string $device): bool
    {
        try {
            \DB::table('user_fcm_tokens')->updateOrInsert(
                ['user_id' => $userId, 'device' => $device],
                [
                    'fcm_token' => $fcmToken,
                    'updated_at' => now(),
                    'created_at' => now()
                ]
            );

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to store FCM token: ' . $e->getMessage());
            return false;
        }
    }
}
