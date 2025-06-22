<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ParticipantStatus: int implements HasLabel, HasColor
{
    case Waiting = 0;
    case Accepted = 1;
    case Rejected = 2;

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Waiting => 'Waiting for Approval',
            self::Accepted => 'Accepted',
            self::Rejected => 'Rejected',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Waiting => 'warning',
            self::Accepted => 'success',
            self::Rejected => 'danger',
        };
    }
}
