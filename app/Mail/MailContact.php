<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailContact extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
 
    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We are glad you reached out to Oratorio',
        );
    } 

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact',
        );
    } 

    public function attachments(): array
    {
        return [];
    }
}
