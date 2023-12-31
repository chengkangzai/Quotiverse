<?php

namespace App\Observers;

use App\Models\Quote;

class QuoteObserver
{
    public function created(Quote $quote): void
    {
        cache()->forget('featured-quotes');
    }

    public function updated(Quote $quote): void
    {
        cache()->forget('featured-quotes');
    }

    public function deleted(Quote $quote): void
    {
        cache()->forget('featured-quotes');
    }

    public function restored(Quote $quote): void
    {
        cache()->forget('featured-quotes');
    }
}
