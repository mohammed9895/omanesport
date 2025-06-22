<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        $events = \App\Models\Competition::query()
            ->where('status', \App\Enums\CompetitionStatus::Active)
            ->orderBy('start_date', 'asc')
            ->take(3)
            ->get();

        return view('livewire.home.index', [
            'events' => $events,
        ]);
    }
}
