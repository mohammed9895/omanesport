<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CompetitionType: int implements HasLabel
{
    case Knockout = 1;
    case League = 2;

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Knockout => 'Knockout',
            self::League => 'League',
        };
    }
}
