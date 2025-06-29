<?php

namespace App\Livewire\Club;

use Livewire\Component;

class Index extends Component
{

    public $amount = 6;

    public function loadMore()
    {
        $this->amount += 6;
    }
    public function render()
    {
        $clubs = \App\Models\Club::with(['members'])->get();

        return view('livewire.club.index', [
            'clubs' => $clubs,
        ]);
    }
}
