<x-app-layout>

    @section('pageTitle', 'Categories')

    <div class="container mx-auto mt-20 px-4 md:px-8 lg:px-16 py-6 rounded-xl">
        <nav class="flex items-center text-sm text-gray-300 mb-6">
            <a href="{{ route('home') }}" class="flex items-center hover:underline">
                <i class="fas fa-home mr-2"></i> Home
            </a>
        </nav>

        <h1 class="text-3xl md:text-4xl font-bold text-zinc-50 mb-8 text-center">
            Categories
        </h1>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach ([['route' => 'players', 'image' => 'players_cat.png', 'title' => 'Players'], ['route' => 'clubs', 'image' => 'Clubs_cat.png', 'title' => 'Clubs'], ['route' => 't-shirts', 'image' => 'tshirts_cat.jpg', 'title' => 'T-shirts'], ['route' => 'movies', 'image' => 'movies_cat.jpg', 'title' => 'Movies & Series'], ['route' => 'cars', 'image' => 'cars_cat.png', 'title' => 'Cars'], ['route' => 'anime', 'image' => 'anime_cat.png', 'title' => 'Anime']] as $category)
                <a href="{{ route('products-by-category', ['category' => $category['route']]) }}"
                    class="relative block overflow-hidden bg-white/50 border border-gray-600 rounded-xl shadow-xl transition-transform duration-300 hover:bg-white/60 group">
                    <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('images/Categories/' . $category['image']) }}" alt="{{ $category['title'] }}">
                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h2 class="text-white text-xl font-semibold">{{ $category['title'] }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div>  
</x-app-layout>
