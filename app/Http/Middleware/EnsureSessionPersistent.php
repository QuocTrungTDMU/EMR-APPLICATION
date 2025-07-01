<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionPersistent
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Ensure session config cho mỗi request
        if ($request->session()->get('is_authenticated')) {
            config([
                'session.lifetime' => 1440,
                'session.expire_on_close' => false
            ]);

            // ✅ Extend session nếu user đang active
            $lastActivity = $request->session()->get('user_last_activity', now());
            $currentTime = now();

            // Nếu user active trong 30 phút qua, extend session
            if ($currentTime->diffInMinutes($lastActivity) < 30) {
                $request->session()->put([
                    'user_last_activity' => $currentTime->toISOString(),
                    'session_expires_at' => $currentTime->addMinutes(1440)->toISOString()
                ]);
            }
        }

        return $next($request);
    }
}
