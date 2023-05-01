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

    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->subject('Great move dear')
    //         ->greeting('Dear intending participant')
    //         ->line('You have take the bold step of faith to join Oratorio Music Foundation. The handbook would guide and help you to understand what Oratorio is, and prepare you for the next phase (Quiz)')
    //         ->action('Download Handbook', url("/oratorio-handbook?email={$this->participant->email}"))
    //         ->action('Start Quiz', url("/register-quiz?email={$this->participant->email}"))
    //         ->line('Ensure you read and understand the handbook before you take the quiz')
    //         ->line('Good Luck!');
    // }
    public function toMail(object $notifiable): MailMessage
{
    return (new MailMessage)
        ->subject('Great move dear')
        ->greeting('Dear intending participant')
        ->line('You have taken the bold step of faith to join Oratorio Music Foundation. The handbook would guide and help you to understand what Oratorio is, and prepare you for the next phase (Quiz)')
        // ->action('Download Handbook', url("/oratorio-handbook?email={$this->participant->email}"))
        // ->action('Start Quiz', url("/oratorio-quiz?email={$this->participant->email}"))
        ->attach(public_path('assets/images/banner/bg.png'))
        ->line('Ensure you read and understand the handbook before you take the quiz')
        ->line('Good Luck!');
}



    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
