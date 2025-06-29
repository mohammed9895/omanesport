<?php

namespace App\Livewire\Contact;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        return view('livewire.contact.index');
    }
}
