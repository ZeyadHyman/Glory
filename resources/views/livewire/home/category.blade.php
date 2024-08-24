<div class="bg-[#13212E] md:rounded-xl mt-5 p-5">
    <h1 class="text-zinc-50 font-bold text-3xl md:text-4xl mb-8 text-center">
        Categories
    </h1>

    <!-- Desktop Version -->
    <div class=" grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 w-full h-full hidden lg:grid">
        @foreach ([['route' => 'players', 'image' => 'players_cat.png', 'title' => 'Players'], ['route' => 'clubs', 'image' => 'Clubs_cat.png', 'title' => 'Clubs'], ['route' => 't-shirts', 'image' => 'tshirts_cat.jpg', 'title' => 'T-shirts'], ['route' => 'movies', 'image' => 'movies_cat.jpg', 'title' => 'Movies & Series'], ['route' => 'cars', 'image' => 'cars_cat.png', 'title' => 'Cars'], ['route' => 'anime', 'image' => 'anime_cat.png', 'title' => 'Anime']] as $category)
            <a href="{{ route('products-by-category', ['category' => $category['route']]) }}"
                class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                <img class="w-full h-full object-cover rounded-xl transition-transform duration-500 group-hover:scale-110"
                    src="{{ asset('images/Categories/' . $category['image']) }}" alt="{{ $category['title'] }}">
                <div
                    class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h1 class="text-white text-xl font-semibold">{{ $category['title'] }}</h1>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Mobile Version -->
    <div class="lg:hidden">
        <div class="splide splide-category w-full">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ([['route' => 'players', 'image' => 'players_cat.png', 'title' => 'Players'], ['route' => 'clubs', 'image' => 'Clubs_cat.png', 'title' => 'Clubs'], ['route' => 't-shirts', 'image' => 'tshirts_cat.jpg', 'title' => 'T-shirts'], ['route' => 'movies', 'image' => 'movies_cat.jpg', 'title' => 'Movies & Series'], ['route' => 'cars', 'image' => 'cars_cat.png', 'title' => 'Cars'], ['route' => 'anime', 'image' => 'anime_cat.png', 'title' => 'Anime']] as $category)
                        <li class="splide__slide mx-2">
                            <div
                                class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                                <a href="{{ route('products-by-category', ['category' => $category['route']]) }}"> <img
                                        class="rounded-xl h-full w-full object-cover"
                                        src="{{ asset('images/Categories/' . $category['image']) }}">
                                    <div
                                        class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <h1 class="text-white text-xl font-semibold">{{ $category['title'] }}</h1>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
