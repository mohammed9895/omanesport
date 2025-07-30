<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionMatch extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function home()
    {
        return $this->belongsTo(User::class, 'home_id');
    }

    public function away()
    {
        return $this->belongsTo(User::class, 'away_id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function group()
    {
        return $this->belongsTo(CompetitionGroup::class, 'group_id');
    }

    public function homeGamer()
    {
        return $this->belongsTo(\App\Models\Gamer::class, 'home_id');
    }

    public function awayGamer()
    {
        return $this->belongsTo(\App\Models\Gamer::class, 'away_id');
    }


}
