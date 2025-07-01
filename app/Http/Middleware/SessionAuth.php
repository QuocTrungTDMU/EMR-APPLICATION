<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class SessionAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra session authentication
        if (!$this->isAuthenticated($request)) {
            return $this->unauthorizedResponse($request);
        }

        // Kiểm tra token expiration
        if ($this->isTokenExpired($request)) {
            $this->clearSession($request);
            return $this->unauthorizedResponse($request, 'Token đã hết hạn');
        }

        return $next($request);
    }

    private function isAuthenticated(Request $request): bool
    {
        return $request->session()->get('is_authenticated', false) &&
            $request->session()->has('nks_access_token') &&
            $request->session()->has('user_id');
    }

    private function isTokenExpired(Request $request): bool
    {
        $expiresAt = $request->session()->get('nks_expires_at');

        if (!$expiresAt) {
            return false; // Không có thông tin expiry thì coi như chưa hết hạn
        }

        return Carbon::parse($expiresAt)->isPast();
    }

    private function clearSession(Request $request): void
    {
        $sessionKeys = [
            'is_authenticated',
            'user_id',
            'user_name',
            'user_email',
            'nks_user_id',
            'nks_access_token',
            'nks_expires_at',
            'nks_user_data',
            'user_last_login_at',
            'user_status'
        ];

        foreach ($sessionKeys as $key) {
            $request->session()->forget($key);
        }
    }

    private function unauthorizedResponse(Request $request, string $message = 'Unauthorized'): Response
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'error_code' => 'UNAUTHORIZED'
            ], 401);
        }

        return redirect()->route('login')
            ->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }
}
