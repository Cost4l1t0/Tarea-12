<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'classification',
        'release_date',
        'review',
        'season',
    ];

    protected $casts = [
        'release_date' => 'date',
        'season'       => 'integer',
    ];

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }
}
