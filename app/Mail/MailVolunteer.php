<?php

namespace App\Mail;

use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailVolunteer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    public $volunteer;

    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }
 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for applying! 😊',
        );
    }
 
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.volunteer',
        );
    } 

    public function attachments(): array
    {
        return [];
    }
}
