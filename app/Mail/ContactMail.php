<?php
// app/Mail/ContactMail.php - FIXED to pass all required variables

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    public function __construct($emailData)
    {
        // ✅ ENSURE ALL REQUIRED VARIABLES EXIST với comprehensive defaults
        $this->emailData = array_merge([
            'name' => 'Unknown',
            'email' => 'unknown@email.com',
            'phone' => 'Không cung cấp',
            'subject' => 'No subject',
            'message' => 'No message',
            'is_authenticated' => false,
            'has_nks_data' => false,
            'nks_id' => null,
            'user_id' => null,
            'nks_username' => null,
        ], $emailData);
    }

    public function build()
    {
        $subject = '📧 Tin nhắn từ ' . $this->emailData['name'];

        if ($this->emailData['has_nks_data']) {
            $subject = '🔐 [NKS] ' . $subject;
        } elseif ($this->emailData['is_authenticated']) {
            $subject = '👤 [User] ' . $subject;
        } else {
            $subject = '👤 [Guest] ' . $subject;
        }

        return $this->subject($subject)
            ->view('emails.contact')
            ->with([
                // ✅ EXPLICITLY PASS ALL VARIABLES để avoid undefined errors
                'name' => $this->emailData['name'],
                'email' => $this->emailData['email'],
                'phone' => $this->emailData['phone'],
                'subject' => $this->emailData['subject'],
                'message' => $this->emailData['message'],
                'messageContent' => $this->emailData['message'], // Alias for compatibility
                'submittedAt' => now()->format('d/m/Y H:i:s'),
                'isAuthenticated' => $this->emailData['is_authenticated'],
                'hasNksData' => $this->emailData['has_nks_data'], // ✅ CRITICAL FIX
                'userId' => $this->emailData['user_id'],
                'nksUserId' => $this->emailData['nks_id'],
                'nksId' => $this->emailData['nks_id'], // Alias for compatibility
                'nksUsername' => $this->emailData['nks_username'],
            ]);
    }
}
