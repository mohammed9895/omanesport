<?php

namespace App\Models;

use App\Enums\ParticipantStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Participant extends MorphPivot
{
    protected $table = 'competition_participants';

    protected $fillable = [
        'competition_id',
        'participant_id',
        'participant_type',
        'status',       // example: pending, approved
    ];

    protected $casts = [
        'status' => ParticipantStatus::class, // Assuming you have a ParticipantStatus enum
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function participant()
    {
        return $this->morphTo();
    }
}
