<x-app-layout>
    @section('pageTitle', $categoryName)

    <div class="mx-4 sm:mx-10 lg:mx-32 my-5 lg:my-10 mt-10 pt-10">
        <nav class="flex text-sm text-gray-400 space-x-2">
            <a href="{{ route('home') }}" class="flex items-center hover:text-white transition-colors duration-300">
                <i class="fas fa-home mr-1"></i> Home
            </a>
            <span class="text-gray-500">&gt;</span>
            <a href="{{ route('categories') }}" class="flex items-center hover:text-white transition-colors duration-300">
                <i class="fas fa-list mr-1"></i> Categories
            </a>
            <span class="text-gray-500">&gt;</span>
            <p class="font-semibold text-white">
                @if ($categoryName == 'Movies')
                    Movies & Series
                @else
                    {{ $categoryName }}
                @endif
            </p>
        </nav>

        <div class="flex w-full items-center justify-between mt-10">
            <h1 class="text-zinc-100 font-bold text-3xl md:text-5xl mb-10 mt-10 text-center">
                @if ($categoryName == 'Movies')
                    Movies & Series
                @else
                    {{ $categoryName }}
                @endif
            </h1>

            <div class="flex justify-end">
                <form method="GET" action="{{ route('products-by-category', ['category' => $categoryName]) }}">
                    <div class="relative">
                        <select name="sort" onchange="this.form.submit()"
                            class="bg-slate-700 text-white py-2 pr-10 pl-3 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-white">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Price: Low
                                to High</option>
                            <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Price:
                                High to Low</option>
                            <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>Name: A-Z
                            </option>
                            <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>Name: Z-A
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5 justify-items-center">
            @foreach ($products as $product)
                @php
                    $images = is_array($product->images) ? $product->images : json_decode($product->images);
                @endphp

                <div
                    class="w-full h-auto bg-gray-900 rounded-xl shadow-lg group relative overflow-hidden transition-transform duration-300 hover:scale-105">
                    <div class="relative h-64 md:h-72 lg:h-80">
                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $product->name }}"
                            class="rounded-xl h-full w-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110">
                    </div>

                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-70 rounded-xl text-center text-zinc-100 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 p-4">
                        <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-2 text-white leading-tight">
                            {{ $product->name }}
                        </h1>
                        <h2 class="text-lg md:text-xl lg:text-2xl font-semibold mb-4 text-green-400">
                            {{ $product->price * (1 - $product->discount / 100) }} EGP
                        </h2>
                        <a href="{{ route('product-details', ['productId' => $product->id]) }}"
                            class="bg-red-600 text-white rounded px-4 py-2 text-sm lg:text-base font-medium transition-transform duration-500 ease-in-out hover:scale-110">
                            Order Now
                        </a>
                    </div>

                    @livewire('components.wishlist-button', ['product' => $product])
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
