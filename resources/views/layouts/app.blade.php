<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title> @yield('title', 'Quoteniverse') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @filamentStyles
    @vite('resources/css/app.css')
    @stack('cdn')
</head>

<body class="bg-white dark:bg-gray-900">
    <x-header />
    @yield('content')

    <x-footer />

    @filamentScripts
    @stack('scripts')
</body>

</html>
