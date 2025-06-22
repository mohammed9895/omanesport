<?php

namespace App\Livewire\Competition;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        $competitions = \App\Models\Competition::query()
            ->where('status', \App\Enums\CompetitionStatus::Active)
            ->orderBy('start_date', 'asc')
            ->get();

        return view('livewire.competition.index',[
            'competitions' => $competitions,
        ]);
    }
}
