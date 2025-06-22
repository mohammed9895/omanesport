<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MemberStatus: int implements HasLabel
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
}
