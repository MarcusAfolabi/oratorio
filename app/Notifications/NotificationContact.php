<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationContact extends Notification implements ShouldQueue
{
    use Queueable;

     
    public function __construct(public Contact $contact)
    {
        //
    }
 
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
 
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('I am writing to inform you that a new user has filled the contact form on our Oratorio website. The user has submitted the following details:')
                    ->line("Name: {$this->contact->fullname}")
                    ->line("Email: {$this->contact->email} ")
                    ->line("Subject: {$this->contact->subject} ")
                    ->line("Message: {$this->contact->message} ")
                    ->action('Go to Dashboard', url('/'))
                    ->line("We appreciate the user's interest in contacting us and we will be responding to their inquiry shortly. In the meantime, we would like to request that you take note of this notification.");
    }
 
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
