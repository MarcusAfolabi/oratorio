<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $table = 'agreements';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
