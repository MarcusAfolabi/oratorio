<?php

namespace App\Mail;

use App\Models\Follower;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNewFollow extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

     
    public function __construct(
        protected Follower $follower
        )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Congrats! You got a new Follower from Oratorio Music Foundation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.mail-new-follow',
            with: [
                'surname' => $this->follower->user->name,
            ]
        );
    }
 
    public function attachments(): array
    {
        return [];
    }
}
