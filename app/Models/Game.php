<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $guarded = [];

    /**
     * Get the user that owns the game.
     */

    public function competition(): HasMany
    {
        return $this->hasMany(Competition::class);
    }

    public function gamers()
    {
        return $this->belongsToMany(Gamer::class, 'gamer_game', 'game_id', 'gamer_id')
            ->withTimestamps();
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_game', 'game_id', 'club_id')
            ->withTimestamps();
    }
}
