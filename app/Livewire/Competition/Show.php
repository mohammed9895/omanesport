<?php

namespace App\Livewire\Competition;

use App\Models\Competition;
use Filament\Notifications\Notification;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public Competition $competition;

    public function mount(Competition $competition)
    {
        $this->competition = $competition;
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

    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        return view('livewire.competition.show');
    }
}
