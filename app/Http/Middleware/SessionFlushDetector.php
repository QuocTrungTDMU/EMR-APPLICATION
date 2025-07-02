<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SessionFlushDetector
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->session()->getId();
        $beforeData = $request->session()->all();
        $beforeCount = count($beforeData);
        $beforeAuth = $request->session()->get('is_authenticated');

        // ✅ Override session methods to detect flushing
        $this->overrideSessionMethods($request, $sessionId);

        Log::info('🔍 SESSION FLUSH DETECTOR - BEFORE', [
            'session_id' => $sessionId,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'before_count' => $beforeCount,
            'before_auth' => $beforeAuth,
            'before_keys' => array_keys($beforeData)
        ]);

        $response = $next($request);

        $afterData = $request->session()->all();
        $afterCount = count($afterData);
        $afterAuth = $request->session()->get('is_authenticated');

        // ✅ Detect dramatic session data loss
        if ($beforeCount > 5 && $afterCount <= 3) {
            Log::error('🚨 SESSION FLUSH DETECTED', [
                'session_id' => $sessionId,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'before_count' => $beforeCount,
                'after_count' => $afterCount,
                'before_auth' => $beforeAuth,
                'after_auth' => $afterAuth,
                'remaining_keys' => array_keys($afterData),
                'stack_trace' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 15)
            ]);
        }

        return $response;
    }

    private function overrideSessionMethods(Request $request, string $sessionId): void
    {
        // ✅ Wrap session flush method to log calls
        $originalSession = $request->session();

        // Note: This is pseudocode - Laravel doesn't allow easy session method override
        // We'll use a different approach with file monitoring
    }
}
