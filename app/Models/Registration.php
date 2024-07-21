<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email','campus','department','level','phone','hostel_address'];
    protected $table = 'registrations';
}
