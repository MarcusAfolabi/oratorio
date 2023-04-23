<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail

{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $table = 'users';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'username',
        'slug',
        'whatsapp',
        'phone',
        'email',
        'linkedin_profile',
        'date_of_birth',
        'city',
        'country',
        'gender',
        'work_experience',
        'biography',
        'industry_id',
        'password',
        'role',
        'community_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function social()
    {
        return $this->hasOne(Social::class);
    }

    public function skill()
    {
        return $this->hasOne(Skill::class);
    }
    
    public function industry()
    {
        return $this->hasOne(Industry::class);
    }

    public function experience()
    {
        return $this->hasOne(Experience::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followee_id', 'user_id')
            ->withTimestamps();
    }

    public function followees()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followee_id')
            ->withTimestamps();
    }

    public function connections()
    {
        return $this->hasMany(Connect::class, 'user_id');
    }

    public function connectors()
    {
        return $this->belongsToMany(User::class, 'connects', 'connected_to', 'user_id');
    }
    public function connectees()
    {
        return $this->belongsToMany(User::class, 'connects', 'connected_to', 'user_id');
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
