<?php

namespace App\Http\Controllers;

use App\Services\NksApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $nksApiService;

    // ✅ Constructor injection - Best practice
    public function __construct(NksApiService $nksApiService)
    {
        $this->nksApiService = $nksApiService;
    }

    public function index(Request $request)
    {
        // ✅ Optional: Lấy thông tin user nếu đã đăng nhập (không bắt buộc)
        $user = Auth::user();
        $isAuthenticated = Auth::check();

        try {
            // ✅ Giữ nguyên logic getInsights() - public cho tất cả users
            $apiResponse = $this->nksApiService->getInsights();

            $latestNews = collect($apiResponse['data'] ?? [])
                ->take(3)
                ->values()
                ->toArray();

            // ✅ Pass thêm user info cho view (optional)
            return view('homepage', [
                'latestNews' => $latestNews,
                'user' => $user,
                'isAuthenticated' => $isAuthenticated,
            ]);
        } catch (\Exception $e) {
            \Log::error('Latest news fetch error: ' . $e->getMessage(), [
                'user_id' => $user?->id ?? 'guest',
                'ip' => $request->ip(),
                'error' => $e->getMessage()
            ]);

            // ✅ Fallback với empty data - homepage vẫn hoạt động
            return view('homepage', [
                'latestNews' => [],
                'user' => $user,
                'isAuthenticated' => $isAuthenticated,
            ]);
        }
    }
}
