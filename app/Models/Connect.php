<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    use HasFactory;
    protected $table = 'connects';

    protected $fillable = ['connected_to', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
