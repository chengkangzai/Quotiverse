<div class="mb-24">
    <nav class="fixed top-0 z-10 w-full bg-gray-800 p-4 text-white">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <a class="text-2xl font-bold" href="/">
                    {{ config('app.name') }}
                </a>
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:text-gray-400">Home</a></li>
                    <li>
                        <a href="/admin" class="rounded-lg bg-sky-500 px-4 py-2 text-white transition-colors hover:bg-sky-600">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
