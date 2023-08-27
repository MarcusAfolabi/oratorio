<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;

 
    public function __construct()
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
                    ->subject('New Attendee')
                    ->line('You just have new Attendee')
                    ->action('Check here', url('/'))
                    ->line('Thank you!');
    }

    
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
