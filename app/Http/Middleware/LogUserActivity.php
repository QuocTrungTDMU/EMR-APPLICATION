<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Log BEFORE processing request
        $this->logUserActivity($request, 'BEFORE_REQUEST');

        $response = $next($request);

        // ✅ Log AFTER processing request
        $this->logUserActivity($request, 'AFTER_REQUEST');

        return $response;
    }

    private function logUserActivity(Request $request, string $stage): void
    {
        $sessionId = $request->session()->getId();
        $sessionData = $request->session()->all();
        $isAuthenticated = $request->session()->get('is_authenticated', false);

        $logData = [
            'stage' => $stage,
            'timestamp' => now()->toISOString(),
            'session_id' => $sessionId,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'is_authenticated' => $isAuthenticated,
            'session_keys' => array_keys($sessionData),
        ];

        if ($isAuthenticated) {
            $logData['user_info'] = [
                'user_id' => $request->session()->get('user_id'),
                'user_name' => $request->session()->get('user_name'),
                'user_email' => $request->session()->get('user_email'),
                'login_timestamp' => $request->session()->get('login_timestamp'),
                'session_persistent' => $request->session()->get('session_persistent'),
            ];

            Log::info('✅ AUTHENTICATED USER ACTIVITY', $logData);
        } else {
            Log::info('❌ UNAUTHENTICATED USER ACTIVITY', $logData);
        }

        // ✅ Special logging for F5/refresh detection
        $referer = $request->header('referer');
        if ($referer && parse_url($referer, PHP_URL_PATH) === parse_url($request->url(), PHP_URL_PATH)) {
            Log::warning('🔄 PAGE REFRESH DETECTED', [
                'session_id' => $sessionId,
                'url' => $request->fullUrl(),
                'user_authenticated_before_refresh' => $isAuthenticated,
                'session_data_count' => count($sessionData),
                'referer' => $referer
            ]);
        }
    }
}
