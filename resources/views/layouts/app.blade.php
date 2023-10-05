<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Default Title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-cover bg-[url('https://img.freepik.com/free-photo/blue-toned-collection-paper-sheets-with-copy-space_23-2148320445.jpg?w=2000&t=st=1696013889~exp=1696014489~hmac=ebf1f36caa90481fe3efb5dad913adb24bfdba10259093a2ae427f52502d37ba')]">
        @include('layouts.navigation.aside')
        @include('layouts.navigation.mobile')

        <x-popup-create-profile />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
