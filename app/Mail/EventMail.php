<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;

   
    public $event;
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for your interest',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.event-mail',
        );
    }

     
    public function attachments(): array
    {
        return [];
    }
}
