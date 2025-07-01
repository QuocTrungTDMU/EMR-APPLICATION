<?php

namespace App\Http\Controllers;

use App\Services\NksApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $nksApiService;

    public function __construct(NksApiService $nksApiService)
    {
        $this->nksApiService = $nksApiService;
    }

    public function index(Request $request)
    {
        // ✅ DETAILED SESSION LOGGING
        Log::info('🏠 HOMEPAGE ACCESSED', [
            'session_id' => $request->session()->getId(),
            'is_authenticated' => $request->session()->get('is_authenticated'),
            'user_name' => $request->session()->get('user_name'),
            'user_email' => $request->session()->get('user_email'),
            'login_timestamp' => $request->session()->get('login_timestamp'),
            'session_created' => $request->session()->get('session_created_at'),
            'all_session_keys' => array_keys($request->session()->all()),
            'session_file_exists' => file_exists(storage_path('framework/sessions/' . $request->session()->getId())),
            'request_time' => now()->toISOString()
        ]);

        // ✅ SỬ DỤNG SESSION THAY VÌ AUTH
        $isAuthenticated = $request->session()->get('is_authenticated', false);
        $userName = $request->session()->get('user_name', 'Guest');
        $userEmail = $request->session()->get('user_email', '');
        $nksUserData = $request->session()->get('nks_user_data', []);
        $userId = $request->session()->get('user_id', null);

        // ✅ Tạo user object từ session data
        $user = null;
        if ($isAuthenticated) {
            $user = (object) [
                'id' => $userId,
                'name' => $userName,
                'email' => $userEmail,
                'nks_user_data' => $nksUserData,
                'role' => $nksUserData['role']['name'] ?? 'user',
                'last_login_at' => $request->session()->get('user_last_login_at'),
            ];

            Log::info('✅ USER OBJECT CREATED FOR HOMEPAGE', [
                'user_id' => $userId,
                'user_name' => $userName,
                'user_role' => $user->role
            ]);
        } else {
            Log::warning('❌ USER NOT AUTHENTICATED ON HOMEPAGE ACCESS', [
                'session_has_data' => !empty($request->session()->all()),
                'session_data_keys' => array_keys($request->session()->all())
            ]);
        }

        try {
            $apiResponse = $this->nksApiService->getInsights();

            $latestNews = collect($apiResponse['data'] ?? [])
                ->take(3)
                ->values()
                ->toArray();

            Log::info('📰 NEWS API CALLED SUCCESSFULLY', [
                'news_count' => count($latestNews),
                'user_authenticated' => $isAuthenticated
            ]);

            return view('homepage', [
                'latestNews' => $latestNews,
                'user' => $user,
                'isAuthenticated' => $isAuthenticated,
            ]);
        } catch (\Exception $e) {
            Log::error('❌ HOMEPAGE ERROR', [
                'error' => $e->getMessage(),
                'user_id' => $userId ?? 'guest',
                'user_name' => $userName,
                'ip' => $request->ip(),
                'session_id' => $request->session()->getId()
            ]);

            return view('homepage', [
                'latestNews' => [],
                'user' => $user,
                'isAuthenticated' => $isAuthenticated,
            ]);
        }
    }
}
