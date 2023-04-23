<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNewAccount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    
    // public $user;
    public function __construct(public User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Welcome to Oratorio Music Foundation!",
        );
    }
 
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.mail-new-account',
        );
    }
 
    public function attachments(): array
    {
        return [];
    }
}
