<?php

namespace App\Filament\Club\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Livewire\Attributes\Computed;

class Competitions extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.gamer.pages.competitions';

    #[Computed]
    public function competitions()
    {
        return \App\Models\Competition::query()
            ->where('status', \App\Enums\CompetitionStatus::Active)
            ->get();
    }

    public function joinCompetition($competitionId)
    {
        $competition = \App\Models\Competition::findOrFail($competitionId);

        if ($competition->gamers()->where('participant_id', auth()->id())->exists()) {
            return Notification::make()
                ->title('Already Joined')
                ->body("You are already a participant in the competition: {$competition->name}.")
                ->warning()
                ->send();
        }

        $competition->gamers()->attach(auth()->user()->gamer->id, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Notification::make()
            ->title('Joined Competition')
            ->body("You have successfully joined the competition: {$competition->name}.")
            ->success()
            ->send();
    }
}
