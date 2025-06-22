<?php

namespace App\Livewire\News;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('livewire.components.layouts.app')]
    public function render()
    {
        $news = \App\Models\News::orderBy('created_at', 'desc')->get();
        return view('livewire.news.index', [
            'news' => $news,
        ]);
    }
}
