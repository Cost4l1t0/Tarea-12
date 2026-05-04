<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    protected $fillable = [
        'name',
        'picture',
        'description',
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
