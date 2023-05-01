<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ParticipantEmailNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Participant extends Authenticatable implements MustVerifyEmail

{
    use Notifiable;

    protected $table = 'participants';

    protected $fillable = ['email'];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new ParticipantEmailNotification);
    }
}
