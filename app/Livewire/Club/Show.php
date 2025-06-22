<?php

namespace App\Livewire\Club;

use App\Models\Club;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public Club $club;

    public function mount(Club $club)
    {
        $this->club = $club;
    }
    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        return view('livewire.club.show');
    }
}
