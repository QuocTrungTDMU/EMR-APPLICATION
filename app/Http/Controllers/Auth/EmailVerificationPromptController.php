<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Nếu user đã đăng nhập và đã verify
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('homepage', absolute: false));
        }

        // Nếu user đã đăng nhập nhưng chưa verify
        if ($request->user()) {
            return view('auth.verify-email', [
                'user' => $request->user()
            ]);
        }

        // Nếu chưa đăng nhập, check session từ registration
        $pendingUserId = session('pending_verification_user_id');
        $pendingEmail = session('pending_verification_email');

        if ($pendingUserId && $pendingEmail) {
            $user = User::find($pendingUserId);

            if ($user && $user->status === 'pending') {
                return view('auth.verify-email', [
                    'user' => $user,
                    'is_guest' => true
                ]);
            }
        }

        // Nếu không có thông tin gì, redirect về login
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');

    }
}
