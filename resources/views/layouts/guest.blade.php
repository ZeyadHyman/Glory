<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Explore Glory, your ultimate online destination for stylish posters. Discover a diverse collection including sports stars, anime, cars, and movies. Enjoy easy browsing, clear images, and a seamless shopping experience on any device. Sign in with Google for added convenience and manage your wishlist with ease.">

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
    <!-- Splide.js -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#13212E] cover" id="body">
    <img src="{{ asset('images/cover_slogan.jpg') }}" class="h-[30vh] w-full object-cover hidden" id="cover">

    <livewire:layout.desktop-navigation />

    <div class="spinner-overlay" id="spinner">
        <div class="spinner">
            <img class="h-20 w-20" src="{{ asset('images/star_white.png') }}" alt="">
        </div>
    </div>

    <main>
        {{ $slot }}
        <livewire:layout.mobile-navigation />
    </main>
    <livewire:layout.footer />

    @livewireScripts
    @yield('script')

</body>

</html>
