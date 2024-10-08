@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nav = document.getElementById("nav");

            window.addEventListener('scroll', () => {
                const isHomePage = window.location.pathname === "/";
                const isAdminPage = window.location.pathname === "/admin/dashboard";
                const scrollThreshold = isHomePage ? window.innerHeight * (32 / 100) : 40;

                if (!isAdminPage) {
                    if (window.pageYOffset > scrollThreshold) {
                        nav.classList.replace("md:w-4/6", "md:w-full");
                        nav.classList.replace("md:px-8", "md:px-48");
                        nav.classList.remove("md:rounded-full");
                    } else {
                        nav.classList.replace("md:w-full", "md:w-4/6");
                        nav.classList.replace("md:px-48", "md:px-8");
                        nav.classList.add("md:rounded-full");
                    }
                }
            });
        });
    </script>
@endsection



<nav class="sticky w-full top-0 pb-[1px] flex justify-center z-50 lg:mt-5" id="navbar">
    <div class="w-full md:w-4/6 py-2 md:py-3 md:px-8 bg-white/90 md:rounded-full transition-all flex items-center justify-between shadow-lg"
        id="nav">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 w-full items-center py-2 lg:py-0">

            {{-- Left item: Brand Name  --}}
            <div class="flex items-center justify-between px-10 lg:px-0">
                <div class="flex-1 flex justify-center lg:hidden">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/glory_logo_blue.png') }}" class="h-8" alt="Glory Logo">
                    </a>
                </div>

                <!-- Search Icon for Mobile -->
                <div class=" lg:hidden block rounded-full">

                    <button x-on:click.prevent="$dispatch('open-modal', 'searchModal')" class='search'>
                        <i class="fa fa-search text-lg text-[#13212E]" aria-hidden="true"></i>
                    </button>

                    <x-modal name="searchModal" :show="false" maxWidth="full" focusable>
                        <div class="py-14 w-full flex items-center justify-center">
                            <div class="p-1">
                                <h1 class="text-zinc-50 text-lg mb-2">Tell me what's in your mind</h1>
                                <div class="relative">
                                    <div
                                        class="absolute start-0 flex justify-center top-3 items-center ps-3 pointer-events-none">
                                        <i class="fa fa-search text-cyan-900" aria-hidden="true"></i>
                                    </div>

                                    <input type="search" id="modal -search" x-ref="modalSearchInput"
                                        wire:model.live="search"
                                        class="block w-full p-2 ps-10 text-sm rounded-lg bg-stone-100 border focus:outline-stone-100 outline-none placeholder-gray-400 text-cyan-900"
                                        placeholder="Search..." />

                                    <div class="">
                                        @if ($searchedProducts->isNotEmpty())
                                            <ul class="mt-4">
                                                @foreach ($searchedProducts as $product)
                                                    <a
                                                        href={{ route('product-details', ['productId' => $product->id]) }}>
                                                        <li class="py-2 border-b text-zinc-50">
                                                            {{ $product->name }}
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        @else
                                            @if ($search)
                                                @if ($search)
                                                    <p class="mt-4 text-zinc-50">No results found.</p>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-modal>

                </div>

                <div class="hidden lg:flex lg:justify-center ">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/glory_logo_blue.png') }}" class="h-8" alt="Glory Logo">
                    </a>
                </div>

                <div class="hidden lg:block lg:flex-1"></div>
            </div>



            @if (strpos(Request::url(), 'home') !== false ||
                    strpos(Request::url(), 'dashboard') !== false ||
                    strpos(Request::url(), 'login') !== false ||
                    strpos(Request::url(), 'register') !== false ||
                    strpos(Request::url(), 'forgot-password') !== false ||
                    strpos(Request::url(), 'reset-password') !== false)
                <div class="hidden lg:block"></div>
            @else
                {{-- Center item: Search  --}}
                <div class="place-self-center items-center hidden lg:inline-block w-full">
                    <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <button x-on:click.prevent="$dispatch('open-modal', 'searchModal')" class='search'
                            style="width: 100%">
                            <input type="search" id="default-search"
                                class="block w-full p-2 ps-10 text-sm rounded-lg bg-stone-100 border focus:outline-stone-100 outline-none placeholder-gray-400 text-cyan-900"
                                placeholder="Search..." readonly />
                        </button>


                        <x-modal name="searchModal" :show="false" maxWidth="full" focusable>
                            <div class="py-10 w-full flex items-center justify-center">
                                <div class="w-1/3">
                                    <h1 class="text-zinc-50 text-xl mb-5">Tell me what's in your mind</h1>
                                    <div class="relative">
                                        <div
                                            class="absolute start-0 flex justify-center top-3 items-center ps-3 pointer-events-none">
                                            <i class="fa fa-search text-cyan-900" aria-hidden="true"></i>
                                        </div>
                                        <input type="search" id="modal-search" x-ref="modalSearchInput"
                                            wire:model.live.debounce.1ms="search"
                                            class="block w-full p-2 ps-10 text-sm rounded-lg bg-stone-100 border focus:outline-stone-100 outline-none placeholder-gray-400 text-cyan-900"
                                            placeholder="Search..." />
                                        <div class="">
                                            @if ($searchedProducts->isNotEmpty())
                                                <ul class="mt-4">
                                                    @foreach ($searchedProducts as $product)
                                                        <a
                                                            href={{ route('product-details', ['productId' => $product->id]) }}>
                                                            <li class="py-2 border-b text-zinc-50">
                                                                {{ $product->name }}
                                                            </li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            @else
                                                @if ($search)
                                                    <p class="mt-4 text-zinc-50">No results found.</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                </div>
            @endif

            {{-- Right item: Icons and Profile Dropdown  --}}
            <div class="items-center place-content-end mr-5 md:mr-0 hidden lg:flex">
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href={{ route('adminDashboard') }}
                            class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                            {{ __('Dashboard') }}
                        </a>

                        <a wire:click="logout"
                            class="cursor-pointer text-red-500 font-bold hover:text-red-400 transition-all hover:transition-all mx-5">
                            {{ __('Log Out') }}
                        </a>
                    @else
                        @livewire('components.cart-wishlist-count')
                        <div class="ml-2 relative group" id="profile">
                            <button>
                                @if (Auth::user()->profile_image)
                                    <img src={{ $user_image }} alt="Profile Image"
                                        class="rounded-full w-10 h-10 object-cover">
                                @else
                                    <i class="fa fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                                @endif
                            </button>
                            {{-- Profile DropDown --}}
                            <div
                                class="dropdown absolute hidden right-1 top-full mt-2  bg-white/80 rounded-b-lg opacity-0 translate-y-2 transition-all duration-300 ease-in-out lg:group-focus-within:opacity-100 lg:group-focus-within:translate-y-0 lg:group-focus-within:block">
                                <div class="px-4 pb-2 pt-3">
                                    <button class="w-full text-start">
                                        <a href={{ route('dashboard') }}
                                            class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                                            {{ __('Dashboard') }}
                                        </a>
                                    </button>
                                </div>
                                <div class="px-4 py-2">

                                    <button class="w-full text-start">
                                        <a href={{ route('profile') }}
                                            class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                                            {{ __('Profile') }}
                                        </a>
                                    </button>
                                </div>

                                <div class="px-4 py-2">
                                    <button wire:click="logout" class="w-full text-start">
                                        <a
                                            class="cursor-pointer text-red-500 font-bold hover:text-red-400 transition-all hover:transition-all">

                                            {{ __('Log Out') }}
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class=" flex items-center group w-full h-full justify-end" id="profile">
                        @livewire('components.cart-wishlist-count')
                        <i class="ml-2 fa-regular fa-user-circle text-3xl text-cyan-900 mr-2 sm:transition-transform sm:duration-300 sm:group-hover:translate-x-0 sm:translate-x-1"
                            aria-hidden="true"></i>
                        <div
                            class="text-cyan-900 font-bold text-sm sm:text-sm sm:transition-all sm:duration-500 sm:opacity-0 sm:-translate-x-10 sm:group-hover:opacity-100 sm:group-hover:translate-x-0 sm:hidden sm:group-hover:block ">
                            <a href="{{ route('login') }}" class="">Login</a>
                            <span class="hidden sm:inline"> / </span>
                            <a href="{{ route('register') }}" class="hidden sm:inline">Register</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>


</nav>
