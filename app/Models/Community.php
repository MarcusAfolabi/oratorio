<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;

    protected $table = 'communities';

    protected $fillable = ['name', 'logo', 'acronyms', 'location', 'phone'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
