<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Participant;


class NewParticipantMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
 
   public $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Oratorio Quiz',
        );
    }
 
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.new-participant-mail',
        );
    } 
    
    public function attachments(): array
    {
        return [];
    }
}
