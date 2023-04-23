<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'title',
        'company_name',
        'employment_type',
        'start_date',
        'end_date',
        'work_description',
        'current_work',
        'part_time_work',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
