<?php

namespace App\Livewire\News;

use App\Models\News;
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
        $news = News::take($this->amount)->orderBy('created_at', 'desc')->get();
        return view('livewire.news.index', [
            'news' => $news,
        ]);
    }
}
