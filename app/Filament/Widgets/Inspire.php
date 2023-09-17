<?php

namespace App\Filament\Widgets;

use App\Models\Quote;
use Filament\Widgets\Widget;

class Inspire extends Widget
{
    protected int|string|array $columnSpan = 'full';

    public Quote $quote;

    protected static string $view = 'filament.widgets.inspire';

    public function mount(): void
    {
        $this->quote = Quote::inRandomOrder()->first();
    }
}
