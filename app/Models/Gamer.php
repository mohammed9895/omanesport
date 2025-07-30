<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the gamer profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'gamer_game', 'gamer_id', 'game_id')
            ->withTimestamps();
    }

    public function competitions()
    {
        return $this->morphToMany(Competition::class, 'participant', 'competition_participants');
    }

    public function member() {
        return $this->members()->first();
    }

    public function competitionGroups()
    {
        return $this->morphToMany(
            \App\Models\CompetitionGroup::class,
            'participant',
            'competition_group_participants'
        )->withTimestamps();
    }

}
