<?php

namespace App\Livewire;

use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class FeaturedQuotes extends Component
{
    /** @var Collection<Quote> */
    public Collection $quotes;

    public bool $stillCanLoad = true;

    public int $limit = 6;

    public function mount(): void
    {
        $this->getQuotes();
    }

    public function loadMore(): void
    {
        $this->limit += 6;
        $this->getQuotes();
    }

    public function render(): View
    {
        return view('livewire.featured-quotes');
    }

    private function getQuotes(): void
    {
        $this->quotes = Quote::limit($this->limit)->get();

        if ($this->quotes->count() <= 0) {
            $this->stillCanLoad = false;
        }

        $totalCanLoad = Quote::count();
        if ($totalCanLoad < $this->limit) {
            $this->stillCanLoad = false;
        }
    }
}
