<?php

namespace App\Models;

use App\Enums\MemberStatus;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => MemberStatus::class,
    ];

    /**
     * Get the gamer that owns the member profile.
     */
    public function gamer()
    {
        return $this->belongsTo(Gamer::class);
    }

    /**
     * Get the club that owns the member profile.
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
