<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\AccountActivationMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Nếu user đã đăng nhập
        if ($request->user()) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(route('dashboard', absolute: false));
            }

            $request->user()->sendEmailVerificationNotification();
            return back()->with('status', 'verification-link-sent');
        }

        // Nếu guest user gửi email từ form
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)
            ->where('status', 'pending')
            ->first();

        if ($user && $user->activation_code) {
            Mail::to($user->email)->send(new AccountActivationMail($user, $user->activation_code));

            return back()->with('success', 'Email kích hoạt đã được gửi lại!');
        }

        return back()->with('error', 'Không tìm thấy tài khoản hoặc tài khoản đã được kích hoạt.');
    }
}
