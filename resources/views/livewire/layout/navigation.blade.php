<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;
new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
};
?>


<nav class="sticky w-full top-0 pb-[1px] flex justify-center z-50">
    <div class="w-4/6 py-3 px-8 bg-white/80 rounded-full transition-all flex items-center justify-between shadow-lg"
        id="nav">
        <div class="grid grid-cols-3 gap-4 w-full items-center">
            {{-- Left item: Brand Name  --}}
            <div>
                <a href={{ route('home') }}>
                    <h1 class="font-bold text-cyan-900 text-2xl">GLory</h1>
                </a>
            </div>

            @if (strpos(Request::url(), 'profile') !== false ||
                    strpos(Request::url(), 'dashboard') !== false ||
                    strpos(Request::url(), 'login') !== false ||
                    strpos(Request::url(), 'register') !== false ||
                    strpos(Request::url(), 'forgot-password') !== false ||
                    strpos(Request::url(), 'reset-password') !== false )
                <div class=""></div>
            @else
                {{-- Center item: Shorter Search Form --}}
                <div class="place-self-center items-center">
                    <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-2 ps-10 text-sm rounded-lg bg-stone-100 border focus:outline-stone-100 outline-none placeholder-gray-400 text-cyan-900"
                            placeholder="Search..." />
                    </div>
                </div>
            @endif


            {{-- Right item: Icons and Profile Dropdown  --}}
            <div class="flex items-center place-content-end ">
                @auth
                    @livewire('components.cart-wishlist-count')


                    <div class="ml-3 relative group" id="profile">
                        <button>
                            <i class="fa fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                        </button>
                        {{-- Profile DropDown --}}
                        <div
                            class="dropdown absolute hidden right-1 top-full mt-2  bg-white/80 rounded-b-lg opacity-0 translate-y-2 transition-all duration-300 ease-in-out group-focus-within:opacity-100 group-focus-within:translate-y-0 group-focus-within:block">
                            <div class="px-4 pb-2 pt-3">
                                <button class="w-full text-start">
                                    <a href={{ route('dashboard') }} wire:navigate
                                        class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                                        {{ __('dashboard') }}
                                    </a>
                                </button>
                            </div>
                            <div class="px-4 py-2">

                                <button class="w-full text-start">
                                    <a href={{ route('profile') }} wire:navigate
                                        class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                                        {{ __('profile') }}
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
                @else
                    <a href={{ route('login') }} class="relative flex items-center group" id="profile">
                        <i class="fa-regular fa-user-circle text-3xl text-cyan-900 mr-2  group-hover:-translate-x-10 transition-all"
                            aria-hidden="true"></i>
                        <span
                            class="text-cyan-900 font-bold absolute left-0 opacity-0 -translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">Login</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
    <script>
        const nav = document.getElementById('nav');
        const profile = document.getElementById('profile');
        const dropdown = profile.querySelector('.dropdown');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                nav.classList.replace('w-4/6', 'w-full');
                nav.classList.replace('px-8', 'px-52');
                nav.classList.remove('rounded-full');
            } else {
                nav.classList.replace('w-full', 'w-4/6');
                nav.classList.replace('px-52', 'px-8');
                nav.classList.add('rounded-full');
            }
        });
    </script>
</nav>
