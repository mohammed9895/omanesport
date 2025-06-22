<?php

namespace App\Filament\Admin\Resources\GamerResource\Pages;

use App\Filament\Admin\Resources\GamerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGamer extends EditRecord
{
    protected static string $resource = GamerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
