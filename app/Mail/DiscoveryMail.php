<?php

namespace App\Mail;

use App\Models\Discovery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DiscoveryMail extends Mailable
{
    use Queueable, SerializesModels;

   public $discovery;
    public function __construct(Discovery $discovery)
    {
        $this->discovery = $discovery;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank for signing up for Discovery Session',
        );
    }
 
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.discovery-mail',
        );
    } 
  
    public function attachments(): array
    {
        return [];
    }
}
