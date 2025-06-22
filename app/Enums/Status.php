<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Status: int implements HasLabel, HasColor
{
    case InActive = 0;
    case Active = 1;

    public function getLabel(): ?string
    {

        return match ($this) {
            self::InActive => 'Inactive',
            self::Active => 'Active',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::InActive => 'danger',
            self::Active => 'success',
        };
    }
}
