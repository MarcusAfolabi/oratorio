<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    } 

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New thought-provoking post on Oratorio Music Foundation',
        );
    } 

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.content-mail',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
