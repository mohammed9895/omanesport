<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public News $post;

    public function mount(News $news)
    {
        $this->post = $news;
    }
    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        return view('livewire.news.show');
    }
}
