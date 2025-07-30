<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionGroup extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function participants()
    {
        return $this->morphedByMany(
            \App\Models\Gamer::class,
            'participant',
            'competition_group_participants'
        )->withTimestamps();
    }

    public function matches()
    {
        return $this->hasMany(CompetitionMatch::class, 'group_id');
    }
}
