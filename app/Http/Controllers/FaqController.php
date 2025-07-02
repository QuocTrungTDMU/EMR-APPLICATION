<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FaqController extends Controller
{
    public function index()
    {
        return view('partials.Page+.faq');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'agree' => 'required',
        ]);

        // Gửi email đến support@hinton.com
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('support@hinton.com')
                    ->subject($request->subject)
                    ->from($request->email, $request->name);
        });

        return redirect()->route('faq')->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
    }
}
