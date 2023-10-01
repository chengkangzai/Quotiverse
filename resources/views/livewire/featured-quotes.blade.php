@php
    /** @var \Illuminate\Support\Collection<\App\Models\Quote> $quotes*/
@endphp
<div class="bg-gray-100 dark:bg-gray-800 py-4" id="quotes">
    <div class="max-w-screen-xl mx-auto">
        <h2 class="pb-6 font-bold text-3xl underline underline-offset-4 dark:text-gray-200 text-center">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-sky-500">
                My Favourite Quotes
            </span>
        </h2>
    </div>

    <div class="grid md:grid-cols-3 gap-4 max-w-screen-xl mx-auto py-4 px-4">
        @foreach($quotes as $quote)
            <div class="bg-gray-50 rounded-lg border text-center px-4 py-4 shadow-xl"
                 data-aos="fade-right"
                 data-aos-duration="1000">
                <div class="flex flex-col justify-between h-full">
                    <p class="prose">
                        {!! str($quote->content)->markdown()->toHtmlString() !!}
                    </p>

                    <div class="text-right mt-6">
                        <p class="text-gray-700">
                            -- {{$quote->author->name}}
                        </p>
                        <p class="text-gray-500 text-sm">
                            {{$quote->author->profession}}
                        </p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <div class="max-w-screen-xl mx-auto flex">
        @if($stillCanLoad)
            <button wire:click="loadMore"
                    class="bg-sky-400 hover:bg-sky-500 focus:ring-sky-300 dark:focus:ring-sky-900 inline-flex items-center justify-center rounded-lg py-3 px-5 text-center text-base font-medium text-white focus:ring-4 mx-auto">
                Load More Quotes
                <x-heroicon-o-arrow-down class="-mr-1 ml-2 h-5 w-5 text-white"/>
            </button>
        @endif
    </div>

    @push('scripts')
        <script>
            AOS.init();
        </script>
    @endpush
</div>
