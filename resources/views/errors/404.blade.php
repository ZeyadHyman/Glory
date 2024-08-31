<!-- resources/views/errors/404.blade.php -->
<x-app-layout>
    @section('pageTitle', 'Page Not Found')

    <div class="flex items-center justify-center h-[80vh] text-white">
        <div class="text-center">
            <!-- Icon with animation -->
            <i class="fas fa-exclamation-triangle text-8xl mb-6 text-red-500 animate-pulse"></i>
            <h1 class="text-8xl font-extrabold mb-6 animate-fade-in">404</h1>
            <p class="text-xl mb-8 animate-fade-in">Oops! The page you're looking for does not exist.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center text-blue-400 underline hover:text-blue-300 transition-colors duration-300 animate-fade-in text-lg font-medium">
                <i class="fas fa-home mr-2"></i> Back to Home
            </a>
        </div>
    </div>
</x-app-layout>
