<div class="bg-[#13212E] md:rounded-xl mt-5 p-5">
    <h1 class="text-zinc-50 font-bold text-3xl md:text-4xl mb-5 text-center">
        Categories
    </h1>
    <div class=" grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 w-full h-full hidden lg:grid">

        <a href="{{ route('products-by-category', ['category' => 'Clubs']) }}"
            class=" p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/Clubs.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">Clubs</h1>
            </div>
        </a>

        <a href="{{ route('products-by-category', ['category' => 't-shirts']) }}"
            class="p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/t-shirts.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">T-shirts</h1>
            </div>
        </a>

        <a href="{{ route('products-by-category', ['category' => 'Players']) }}"
            class=" p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/players.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">Players </h1>
            </div>
        </a>

        <a href="{{ route('products-by-category', ['category' => 'movies']) }}"
            class=" p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/Clubs.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">Movies & Series</h1>
            </div>
        </a>

        <a href="{{ route('products-by-category', ['category' => 'cars']) }}"
            class=" p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/Clubs.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">Cars</h1>
            </div>
        </a>

        <a href="{{ route('products-by-category', ['category' => 'Anmine']) }}"
            class=" p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
            <img class="rounded-xl h-full w-full object-cover" src="{{ asset('images/Categories/Clubs.png') }}">
            <div
                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h1 class="text-zinc-50 text-xl font-bold">Anmine</h1>
            </div>
        </a>

    </div>

    {{-- Mobile Version --}}
    <div class="splide splide-category w-full h-full block lg:hidden">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide mx-2">
                    <div
                        class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 'Clubs']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/Clubs.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">Clubs</h1>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="splide__slide mx-2">
                    <div
                        class="p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 't-shirts']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/t-shirts.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">T-shirts</h1>
                            </div>
                        </a>
                    </div>
                </li>

                <li class="splide__slide mx-2">
                    <div
                        class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 'Players']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/Clubs.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">Players</h1>
                            </div>
                        </a>
                    </div>
                </li>

                <li class="splide__slide mx-2">
                    <div
                        class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 'movies']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/players.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">Movies & Series </h1>
                            </div>
                        </a>
                    </div>
                </li>

                <li class="splide__slide mx-2">
                    <div
                        class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 'cars']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/Clubs.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">Cars</h1>
                            </div>
                        </a>
                    </div>
                </li>

                <li class="splide__slide mx-2">
                    <div
                        class="h-full w-full p-5 border border-gray-600 rounded-xl shadow-xl flex-1 group relative overflow-hidden bg-white/50 hover:bg-white/60 transition-transform duration-300">
                        <a href="{{ route('products-by-category', ['category' => 'Anime']) }}"> <img
                                class="rounded-xl h-full w-full object-cover"
                                src="{{ asset('images/Categories/Clubs.png') }}">
                            <div
                                class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h1 class="text-zinc-50 text-xl font-bold">Anime</h1>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
