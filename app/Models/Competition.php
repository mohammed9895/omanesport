<?php

namespace App\Models;

use App\Enums\CompetitionType;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $guarded = [];

    protected $casts = [
        'type' => CompetitionType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => 'boolean',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function category()
    {
        return $this->belongsTo(CompetitionCategory::class, 'competition_category_id');
    }

    public function participants()
    {
        return $this->morphToMany(null, 'participant', 'competition_participants');
    }

    public function gamers()
    {
        return $this->morphedByMany(Gamer::class, 'participant', 'competition_participants');
    }

    public function clubs()
    {
        return $this->morphedByMany(Club::class, 'participant', 'competition_participants');
    }

}
