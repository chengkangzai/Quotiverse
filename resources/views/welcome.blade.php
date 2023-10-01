@extends('layouts.app')

@push('cdn')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endpush

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl py-8 px-4 text-center lg:py-16 lg:px-12">
            <p class="mb-4 font-extrabold leading-none tracking-tight text-gray-200 text-xl">
                Hi there!
            </p>
            <h1
                class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                I'm CCK, welcome to my
            </h1>
            <p class="mb-4 text-4xl lg:text-5xl font-extrabold leading-none tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-sky-500">
                {{config('app.name')}}
            </p>
            <p class="mb-8 text-lg font-normal text-gray-500 dark:text-gray-400 sm:px-16 lg:text-xl xl:px-48">
                Here are some of my favorite quotes. I hope you enjoy them as much as I do.
            </p>
            <div
                class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 lg:mb-16">
                <a href="#quotes"
                   class="bg-sky-400 hover:bg-sky-500 focus:ring-sky-300 dark:focus:ring-sky-900 inline-flex items-center justify-center rounded-lg py-3 px-5 text-center text-base font-medium text-white focus:ring-4">
                    Check it out!
                    <x-heroicon-o-arrow-down class="-mr-1 ml-2 h-5 w-5 text-white"/>
                </a>
                <a href="https://chengkangzai.com"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-300 py-3 px-5 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Check out my portfolio
                    <x-heroicon-m-arrow-right class="-ml-1 mr-2 h-5 w-5 text-gray-500"/>
                </a>
            </div>
        </div>
    </section>

    <livewire:featured-quotes/>

    <footer class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto py-8 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center" aria-label="Footer">
                <p class="text-base text-gray-500 dark:text-gray-400 mr-4">
                    Built with ❤️ By <a href="https://chengkangzai.com">Ching Cheng Kang</a>
                </p>

                <p class="text-base text-gray-500 dark:text-gray-400 mr-4">
                    |
                </p>

                <a href="https://chengkangzai.com"
                   class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                    About Me
                </a>
            </nav>
            <div class="mt-8 flex justify-center space-x-6">
                <a href="https://github.com/chengkangzai"
                   class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                    <span class="sr-only">Github</span>
                    @svg('fab-github', 'h-6 w-6')
                </a>
                <a href="https://twitter.com/chengkangzai"
                   class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                    <span class="sr-only">Twitter</span>
                    @svg('fab-twitter', 'h-6 w-6')
                </a>
                <a href="https://www.linkedin.com/in/chingchengkang/"
                   class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                    <span class="sr-only">LinkedIn</span>
                    @svg('fab-linkedin', 'h-6 w-6')
                </a>
            </div>
        </div>
    </footer>

@endsection

