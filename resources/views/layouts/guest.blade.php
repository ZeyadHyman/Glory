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


    {{-- Splidejs --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#13212E]" id="body">
    <img src="{{ asset('images/cover_slogan.jpg') }}" class="h-[30vh] w-full object-cover hidden" alt=""
        id="cover">

    <main>
        <livewire:layout.navigation />
        {{ $slot }}
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cover = document.getElementById('cover');
            const body = document.getElementById('body');
            if (window.location.pathname === '/') {
                cover.classList.add('xl:block');
            }
            if (window.location.pathname === '/login' || window.location.pathname === '/register') {
                body.classList.add('cover');
            }
        });
    </script>
</body>

</html>
