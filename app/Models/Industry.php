<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'industries';

    protected $fillable = ['name', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
