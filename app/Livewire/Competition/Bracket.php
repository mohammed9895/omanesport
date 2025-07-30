<?php

namespace App\Livewire\Competition;

use App\Models\Competition;
use App\Models\CompetitionMatch;
use Livewire\Component;

class Bracket extends Component
{
    public Competition $competition;
    public array $matchesByRound = [];

    public function mount(Competition $competition)
    {
        $this->competition = $competition;

        $matches = CompetitionMatch::query()
            ->where('competition_id', $competition->id)
            ->whereNull('group_id') // knockout only
            ->orderBy('round')
            ->get();

        // Use manual groupBy to avoid Laravel morphClass bug
        $grouped = [];

        foreach ($matches as $match) {
            $round = $match->round ?? 0;
            $grouped[$round][] = $match;
        }

        $this->matchesByRound = $grouped;
    }

    public function render()
    {
        return view('livewire.competition.bracket', [
            'matchesByRound' => $this->matchesByRound,
        ]);
    }
}
