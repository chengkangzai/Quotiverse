@php
    /**
     * @var \App\Models\Quote $quote
     */
@endphp
<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Quote of the day
        </x-slot>

        <x-slot name="description">
            {{ $quote->author->name }} @if ($quote->author->profession)
                ({{ $quote->author->profession }})
            @endif
        </x-slot>

        {{ $quote->content }}
    </x-filament::section>
</x-filament-widgets::widget>
