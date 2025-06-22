<?php

namespace App\Models;

use App\Enums\ClubStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => ClubStatus::class,
    ];

    /**
     * Get the user that owns the club.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the members of the club.
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Get the games associated with the club.
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'club_game', 'club_id', 'game_id')
            ->withTimestamps();
    }

    public function competitions()
    {
        return $this->morphToMany(Competition::class, 'participant', 'competition_participants');
    }

}
