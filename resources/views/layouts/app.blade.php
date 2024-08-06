<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- App Title --}}
    <title>{{ config('app.name') }} - @yield('pageTitle')</title>

    {{-- App Icon --}}
    <link rel="shortcut icon" href={{ asset('images/star_white.png') }} type="image/x-icon">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#13212E] cover" id="body">
    <img src="{{ asset('images/cover_slogan.jpg') }}" class="h-[30vh] w-full object-cover hidden" id="cover">

    <livewire:layout.desktop-navigation />
    <main>
        {{ $slot }}
        <livewire:layout.mobile-navigation />
    </main>
    <livewire:layout.footer />

    @yield('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cover = document.getElementById('cover');
            const body = document.getElementById('body');
            if (window.location.pathname === '/') {
                cover.classList.add('lg:block');
            }
            if (window.location.pathname === '/' || window.location.pathname === '/profile') {
                body.classList.remove('cover');
            }
        });
    </script>
</body>

</html>
