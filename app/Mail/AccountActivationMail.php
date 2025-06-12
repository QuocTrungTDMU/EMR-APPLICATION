<?php
// app/Mail/AccountActivationMail.php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activationToken;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $activationToken)
    {
        $this->user = $user;
        $this->activationToken = $activationToken;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kích hoạt tài khoản - ' . config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.account-activation',
            with: [
                'user' => $this->user,
                'activationToken' => $this->activationToken,
                'activationUrl' => route('user.activate', ['token' => $this->activationToken]),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
