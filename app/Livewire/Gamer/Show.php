<?php

namespace App\Livewire\Gamer;

use App\Models\Gamer;
use Livewire\Component;

class Show extends Component
{

    public Gamer $gamer;

    public function mount(Gamer $gamer)
    {
        $this->gamer = $gamer;
    }

    public function render()
    {
        return view('livewire.gamer.show');
    }
}
