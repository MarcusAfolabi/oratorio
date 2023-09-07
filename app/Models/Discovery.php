<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{
    use HasFactory;

    protected $table = 'discoveries';
    protected $fillable = ['fullname', 'email', 'phone', 'school', 'presentation', 'group'];
}
