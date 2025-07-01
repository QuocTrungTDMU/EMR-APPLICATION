<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateSession
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra session authentication
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')
                ->withErrors(['email' => 'Vui lòng đăng nhập để tiếp tục.']);
        }

        return $next($request);
    }
}
