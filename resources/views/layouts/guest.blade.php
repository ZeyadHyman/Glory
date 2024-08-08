<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- App Title --}}
    <title>{{ config('app.name') }} - @yield('pageTitle')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    {{-- App Icon --}}
    <link rel="shortcut icon" href="{{ asset('images/star_white.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @livewireStyles
    @livewireScripts
    <!-- Splide.js -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js" defer></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
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
        document.addEventListener('DOMContentLoaded', function() $(document).ready(function() {
                    const cover = document.getElementById('cover');
                    const body = document.getElementById('body');
                    const test = document.getElementById('test');

                    if (window.location.pathname === '/') {
                        cover.classList.add('lg:block');
                    }
                    if (window.location.pathname === '/' || window.location.pathname === '/profile') {
                        body.classList.remove('cover');
                    }

                    // Hide the element with id "test" if the URL path is /admin/dashboard
                    if (window.location.pathname === '/admin/dashboard') {
                        test.style.display = 'none';
                    }
                });
    </script>
</body>

</html>
