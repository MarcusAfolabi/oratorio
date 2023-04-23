<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContentNotification extends Notification implements ShouldQueue

{
    use Queueable;

    
    public function __construct(public Post $post)
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
                    // ->from('Oratorio Music Foundation - support@oratoriogroup.org')
                    ->greeting('Dear valued Oratorio,')
                    ->subject('New thought-provoking post on Oratorio Music Foundation')
                    ->line('We are excited to announce that a new thought-provoking post has just been shared on Oratorio Music Foundation. As the Media and Publicity Director, I am proud to present this new addition to our platform that is sure to inspire and captivate our audience.')
                    ->line('Our team has worked tirelessly to bring you this latest post, which explores new ideas and challenges conventional thinking. We believe that this post will not only entertain and educate you but also spark discussions and debates that will enrich our community.')
                    ->line("So, head over to Oratorio Music Foundation now to read the latest post and join the conversation. We can't wait to hear your thoughts on this exciting new addition!")
                    ->action('Read now', url('/feeds'))
                    ->line('Media and Publicity Director,');
    }

    
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
