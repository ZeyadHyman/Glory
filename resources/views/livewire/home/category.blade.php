<div class="bg-[#13212E] md:rounded-xl mt-5">
    <h1 class="text-zinc-50 font-bold text-3xl md:text-4xl mb-8 text-center">
        Categories
    </h1>

    <!-- Desktop Version -->
    <div class=" grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 w-full h-full hidden lg:grid">
        @foreach ($categories as $category)
            <a href="{{ route('products-by-category', ['category' => $category->name]) }}"
                class="h-full w-full p-2 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                <img class="w-full h-full object-cover rounded-xl transition-transform duration-500 group-hover:scale-110"
                    src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                <div
                    class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h1 class="text-white text-xl font-semibold">{{ $category->name }}</h1>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Mobile Version -->
    <div class="lg:hidden">
        <div class="splide splide-category w-full">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($categories as $category)
                        <li class="splide__slide mx-2">
                            <div
                                class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                                <a href="{{ route('products-by-category', ['category' => $category->name]) }}">
                                    <img class="rounded-xl h-full w-full object-cover"
                                        src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                    <div
                                        class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <h1 class="text-white text-xl font-semibold">{{ $category->name }}</h1>
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
