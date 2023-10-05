<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel GUEST BLADE') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-cover bg-[url('https://img.freepik.com/free-photo/blank-letter-stationery-set_53876-147796.jpg?w=1380&t=st=1695230061~exp=1695230661~hmac=67849dc4dcf510615f84a13fd06c3ce8e3f71aea56c0bbb3ad96c7dbc051df61')]">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 ">
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
