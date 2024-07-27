<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon"
        href="https://images.pexels.com/photos/698899/pexels-photo-698899.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        type="image/x-icon">
    <title>{{ config('app.name') }} - @yield('pageTitle')</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-900 pt-5">
    <main>
        {{ $slot }}
    </main>
</body>

</html>
