<x-app-layout>

    @section('pageTitle', 'Categories')

    <div class="mx-4 sm:mx-8 lg:mx-16 my-5 lg:my-10 mt-10 pt-10 min-h-screen">
        <nav class="flex text-sm text-gray-400 space-x-2 mb-6">
            <a href="{{ route('home') }}" class="flex items-center hover:text-white transition-colors duration-300">
                <i class="fas fa-home mr-1"></i> Home
            </a>
            <span class="text-gray-500">&gt;</span>
            <span class="text-white mx-1">
                <i class="fas fa-list"></i> Categories
            </span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-bold text-zinc-50 mb-8 text-center">
            Categories
        </h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4  gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('products-by-category', ['category' => $category->name]) }}"
                    class="relative block overflow-hidden rounded-lg shadow-lg transition-transform duration-300 group">
                    <img class="w-full h-64 md:h-72 object-cover transition-transform duration-500 group-hover:scale-105"
                        src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/40 to-white/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                        <h2 class="text-white text-sm md:text-lg lg:text-xl font-semibold text-center">
                            {{ $category->name }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
