@php
    /** @var \Illuminate\Support\Collection<\App\Models\Quote> $quotes*/
@endphp
<div class="bg-gray-100 py-4 dark:bg-gray-800" id="quotes">
    <div class="mx-auto max-w-screen-xl">
        <h2 class="pb-6 text-center text-3xl font-bold underline underline-offset-4 dark:text-gray-200">
            <span class="bg-gradient-to-r from-pink-500 to-sky-500 bg-clip-text text-transparent">
                My Favourite Quotes
            </span>
        </h2>
    </div>

    <div class="mx-auto flex max-w-screen-xl flex-col gap-2 p-4">
        @foreach ($quotes as $quote)
            <a href="{{ route('quote', $quote) }}">
                <div class="rounded bg-gray-50 py-2 px-8" data-aos="fade-right" data-aos-duration="1000">
                    <p class="text-xl font-medium leading-relaxed">
                        {!! $quote->content !!}
                    </p>
                    <div>
                        <p class="text-sm text-gray-700">
                            -- {{ $quote->author->name }}
                            @if($quote->author->profession)
                                (<span class="text-xs text-gray-500">{{ $quote->author->profession }}</span>)
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @push('scripts')
        <script>
            AOS.init();
        </script>
    @endpush
</div>
