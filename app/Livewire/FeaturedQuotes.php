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

    public function mount(): void
    {
        $this->getQuotes();
    }

    public function render(): View
    {
        return view('livewire.featured-quotes');
    }

    private function getQuotes(): void
    {
        $this->quotes = cache()->remember(
            key: 'featured-quotes',
            ttl: 60 * 60 * 24,
            callback: fn () => Quote::all()
        );
    }
}
