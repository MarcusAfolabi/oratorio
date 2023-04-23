<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Welcome to the Oratorio Music Foundation!')
                    ->greeting("Dear {$this->user->name},")
                    ->line('On behalf of the Oratorio Music Foundation, I would like to extend a warm welcome to our esteemed family. We are thrilled to have you as a part of our community of music enthusiasts and we look forward to embarking on an exciting journey together.                    ')
                    ->line('As a member of the Oratorio Music Foundation, you will have access to exclusive performances, workshops, and events that showcase the beauty and power of music. Our aim is to promote the art of oratorio music, and we are proud to have members like you who share our passion.')
                    ->line('With your support, we can continue to create enriching experiences for our members and audiences. We hope to inspire you, challenge you, and make your love for music grow even stronger.')
                    ->line("Once again, welcome to the Oratorio Music Foundation family. We can't wait to see what the future holds for us.")
                    ->action('Return Home', url('/feeds'))
                    ->line('Media Director');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
    public function toDatabase($notifiable)
{
    return [
        'data' => 'This is a test notification.',
        'read_at' => null
    ];
}
}
