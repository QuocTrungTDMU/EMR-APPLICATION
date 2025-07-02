<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckNksToken
{
    public function handle(Request $request, Closure $next)
    {
        // Lấy token từ cookie, nếu không có thì lấy từ header Authorization
        $token = $request->cookie('nks_access_token');
        if (!$token) {
            $token = $request->bearerToken();
            Log::info('NKS Middleware - Token from header:', ['token' => $token]);
        } else {
            Log::info('NKS Middleware - Token from cookie:', ['token' => $token]);
        }

        if (!$token) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['error' => 'No token found'], 401);
            }
            return redirect('/login');
        }

        // Gọi API NKS để xác thực token và lấy user info
        $response = Http::withToken($token)
            ->get('https://account.nks.vn/api/nks/user/me');

        Log::info('NKS Middleware - API response', ['body' => $response->body(), 'status' => $response->status()]);

        if ($response->successful() && $response->json('success')) {
            // Lưu thông tin user vào request để dùng ở controller/view
            $request->attributes->set('nks_user', $response->json('data.user'));
            Log::info('NKS Middleware - Token valid, user authenticated');
            return $next($request);
        } else {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'error' => 'Token invalid or expired',
                    'api_response' => $response->json(),
                    'status' => $response->status()
                ], 401);
            }
            Log::warning('NKS Middleware - Token invalid or expired', ['body' => $response->body(), 'status' => $response->status()]);
            // Token không hợp lệ hoặc hết hạn
            return redirect('/login');
        }
    }
} 