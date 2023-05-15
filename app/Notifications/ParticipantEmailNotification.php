<?php

namespace App\Notifications;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ParticipantEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $participant;
    
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Audition Participant')
            ->greeting('Dear Admin,')
            ->line('You have another participant that is about to take the test');
    }



    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
