<?php

namespace App\Notifications;

use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationVolunteer extends Notification implements ShouldQueue
{
    use Queueable;

   
    public function __construct(public Volunteer $volunteer)
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
                    ->subject('Volunteer Service Alert')
                    ->line('We are pleased to inform you that a new volunteer has registered on our website. This individual has expressed a desire to contribute their time and effort towards our upcoming event and annual anniversary.')
                    ->line('We believe that this new volunteer will be an asset to our organization and help us achieve our goals. We encourage you to reach out to them as soon as possible to welcome them to our team and provide any necessary information regarding their volunteering role.')
                    ->line("Full name : {$this->volunteer->firstname} {$this->volunteer->lastname} ")
                    ->line("Location : {$this->volunteer->location} ")
                    ->line("Email : {$this->volunteer->email} ")
                    ->line("Phone : {$this->volunteer->phone} ")
                    ->line("Department : {$this->volunteer->department} ")
                    ->line("Born Again : {$this->volunteer->born_again} ")
                    ->line("Meeting Attendance : {$this->volunteer->attendance} ")
                    ->line('Thank you for your continued support in making Oratorio a success. If you have any questions or concerns, please do not hesitate to contact us.')
                    ->line('Sharon,')
                     ->line('Volunteer Coordinator.');
    }
 
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
