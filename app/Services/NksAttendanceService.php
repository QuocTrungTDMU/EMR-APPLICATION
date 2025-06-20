<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NksAttendanceService
{
    private $baseUrl = 'https://account.nks.vn/api/nks/user';
    private $accessToken;

    public function __construct()
    {
        $this->accessToken = session('nks_access_token');
    }

    /**
     * Thực hiện check in
     */
    public function checkin(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/checkin', $data);

            if ($response->successful()) {
                $responseData = $response->json();

                return [
                    'success' => $responseData['status'] ?? false,
                    'data' => $responseData,
                    'message' => 'Check in thành công'
                ];
            }

            Log::error('NKS Checkin API Error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return [
                'success' => false,
                'message' => 'API Error: ' . $response->status()
            ];
        } catch (\Exception $e) {
            Log::error('NKS Checkin Service Error', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'Service Error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Thực hiện check out
     */
    public function checkout(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/checkout', $data);

            if ($response->successful()) {
                $responseData = $response->json();

                return [
                    'success' => $responseData['status'] ?? false,
                    'data' => $responseData,
                    'message' => 'Check out thành công'
                ];
            }

            Log::error('NKS Checkout API Error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return [
                'success' => false,
                'message' => 'API Error: ' . $response->status()
            ];
        } catch (\Exception $e) {
            Log::error('NKS Checkout Service Error', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'Service Error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Lấy danh sách điểm danh
     */
    public function getAttendances(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/attendances', $data);

            if ($response->successful()) {
                $responseData = $response->json();

                return [
                    'success' => true,
                    'data' => $responseData['list'] ?? [],
                ];
            }

            return [
                'success' => false,
                'message' => 'API Error: ' . $response->status()
            ];
        } catch (\Exception $e) {
            Log::error('NKS Attendances Service Error', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'Service Error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Tracking điểm danh
     */
    public function tracking(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/tracking', $data);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json()['list'] ?? [],
                ];
            }

            return [
                'success' => false,
                'message' => 'API Error: ' . $response->status()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Lấy tracking logs
     */
    public function getTrackingLogs(array $data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/trackinglogs', $data);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json()['list'] ?? [],
                ];
            }

            return [
                'success' => false,
                'message' => 'API Error: ' . $response->status()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error: ' . $e->getMessage()
            ];
        }
    }
}
