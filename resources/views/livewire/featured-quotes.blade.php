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

    <div class="max-w-screen-xl p-4 mx-auto flex flex-col gap-2">
        @foreach($quotes as $quote)
            <div class="bg-gray-50 rounded py-2 px-8"
                 data-aos="fade-right"
                 data-aos-duration="1000">
                    <p class="text-xl">
                        {!! $quote->content !!}
                    </p>
                <div>
                    <p class="text-gray-700 text-sm">
                        -- {{$quote->author->name}}
                        (<span class="text-gray-500 text-xs">{{$quote->author->profession}}</span>)
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
        <script>
            AOS.init();
        </script>
    @endpush
</div>
