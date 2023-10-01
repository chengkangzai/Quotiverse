<?php

namespace App\Livewire;

use App\Filament\Resources\QuoteResource;
use App\Models\Quote;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class QuotePage extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public Quote $quote;

    public function mount(Quote $quote): void
    {
        $quote->loadMissing('author');
        $this->quote = $quote;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return QuoteResource::infolist($infolist)
            ->record($this->quote);
    }

    public function render(): View
    {
        return view('livewire.quote-page')
            ->extends('layouts.app')
            ->section('content');
    }
}
