<?php

namespace App\Services;

use Google_Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirebaseService
{
    private $token;
    private $projectId = 'nksproject-38a44';

    public function __construct()
    {
        $this->initializeGoogleClient();
    }

    private function initializeGoogleClient()
    {
        try {
            $client = new Google_Client();
            $client->setAuthConfig(storage_path('app/firebase-service-account.json'));
            $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
            $client->useApplicationDefaultCredentials();
            $this->token = $client->fetchAccessTokenWithAssertion();

            Log::info('✅ Firebase Service Account authenticated successfully');
        } catch (\Exception $e) {
            Log::error('❌ Firebase Service Account failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function sendToDevice($title, $body, $fcmToken, $data = [])
    {
        try {
            $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

            $message = [
                'message' => [
                    'token' => $fcmToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => $this->formatData($data),
                    'webpush' => [
                        'headers' => ['Urgency' => 'high'],
                        'notification' => [
                            'title' => $title,
                            'body' => $body,
                            'icon' => '/favicon.ico'
                        ]
                    ]
                ]
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->token['access_token'],
                'Content-Type' => 'application/json'
            ])->post($url, $message);

            if ($response->successful()) {
                Log::info('✅ FCM notification sent via Service Account');
                return true;
            } else {
                Log::error('❌ FCM notification failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('❌ FCM send error: ' . $e->getMessage());
            return false;
        }
    }

    private function formatData(array $data): array
    {
        $formatted = [];
        foreach ($data as $key => $value) {
            $formatted[$key] = is_string($value) ? $value : json_encode($value);
        }
        return $formatted;
    }
}
