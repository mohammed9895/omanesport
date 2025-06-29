<?php

namespace App\Livewire\Competition;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    public $amount = 6;

    public function loadMore()
    {
        $this->amount += 6;
    }

    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        $competitions = \App\Models\Competition::query()
            ->where('status', \App\Enums\CompetitionStatus::Active)
            ->take($this->amount)
            ->orderBy('start_date', 'asc')
            ->get();

        return view('livewire.competition.index',[
            'competitions' => $competitions,
        ]);
    }
}
