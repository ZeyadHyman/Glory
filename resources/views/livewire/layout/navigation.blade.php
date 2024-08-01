<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;
use App\Models\SocialLogin;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public string $user_image = '';

    #[On('profile-image-updated')]
    public function mount()
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }

    /**
     * Check if a user exists in the SocialLogin table by user_id.
     *
     * @param  int  $userId
     * @return bool
     */
    public function userExistsInSocialLogin(int $userId): bool
    {
        return SocialLogin::where('user_id', $userId)->exists();
    }

    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
};
?>




@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nav = document.getElementById("nav");
            const navbar = document.getElementById("navbar");
            const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

            const scrollEvent = isIOS ? "touchmove" : "scroll";


            window.addEventListener(scrollEvent, () => {
                if (window.location.pathname === "/") {
                    if (window.pageYOffset > 200) {
                        nav.classList.replace("md:w-4/6", "md:w-full");
                        nav.classList.replace("md:px-8", "md:px-48");
                        nav.classList.remove("md:rounded-full");
                    } else {
                        nav.classList.replace("md:w-full", "md:w-4/6");
                        nav.classList.replace("md:px-48", "md:px-8");
                        nav.classList.add("md:rounded-full");
                    }
                } else {
                    navbar.classList.add("mt-5");
                    if (window.pageYOffset > 40) {
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

<nav class="sticky w-full top-0 pb-[1px] flex justify-center z-50" id="navbar">
    <div class="w-full md:w-4/6 py-2 md:py-3 md:px-8 bg-white/80 md:rounded-full transition-all flex items-center justify-between shadow-lg"
        id="nav">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full items-center ml-5 md:ml-0">
            {{-- Left item: Brand Name  --}}
            <div>
                <a href={{ route('home') }}>
                    <img src={{ asset('images/glory_logo_blue.png') }} class="h-8">
                </a>
            </div>

            @if (strpos(Request::url(), 'profile') !== false ||
                    strpos(Request::url(), 'dashboard') !== false ||
                    strpos(Request::url(), 'login') !== false ||
                    strpos(Request::url(), 'register') !== false ||
                    strpos(Request::url(), 'forgot-password') !== false ||
                    strpos(Request::url(), 'reset-password') !== false)
                <div class="hidden md:block"></div>
            @else
                {{-- Center item: Shorter Search Form --}}
                <div class="place-self-center items-center hidden md:inline-block">
                    <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-2 ps-10 text-sm rounded-lg bg-stone-100 border focus:outline-stone-100 outline-none placeholder-gray-400 text-cyan-900"
                            placeholder="Search..." />
                    </div>
                </div>
            @endif


            {{-- Right item: Icons and Profile Dropdown  --}}
            <div class="flex items-center place-content-end mr-5 md:mr-0">
                @if (auth()->check())
                    @livewire('components.cart-wishlist-count')
                    <div class="ml-3 relative group" id="profile">
                        <button>
                            @if (Auth::user()->profile_image)
                                <img src={{ $user_image }} alt="Profile Image"
                                    class="rounded-full w-9 h-9 mt-1 object-cover">
                            @else
                                <i class="fa fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                            @endif
                        </button>
                        {{-- Profile DropDown --}}
                        <div
                            class="dropdown absolute hidden right-1 top-full mt-2  bg-white/80 rounded-b-lg opacity-0 translate-y-2 transition-all duration-300 ease-in-out group-focus-within:opacity-100 group-focus-within:translate-y-0 group-focus-within:block">
                            <div class="px-4 pb-2 pt-3">
                                <button class="w-full text-start">
                                    <a href={{ route('dashboard') }}
                                        class="text-cyan-900 font-bold hover:text-cyan-700 transition-all hover:transition-all">
                                        {{ __('dashboard') }}
                                    </a>
                                </button>
                            </div>
                            <div class="px-4 py-2">

                                <button class="w-full text-start">
                                    <a href={{ route('profile') }}
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
                    <div class=" flex items-center group sm:mr-5 w-full h-full justify-end" id="profile">
                        <i class="fa-regular fa-user-circle text-3xl text-cyan-900 mr-2 sm:translate-x-[128px] sm:group-hover:translate-x-0 sm:transition-all"
                            aria-hidden="true"></i>
                        <div
                            class="text-cyan-900 font-bold text-sm sm:text-sm sm:transition-all sm:duration-500 sm:opacity-0 sm:-translate-x-10 sm:group-hover:opacity-100 sm:group-hover:translate-x-0">
                            <a href="{{ route('login') }}" class="">Login</a>
                            <span class="hidden sm:inline"> / </span>
                            <a href="{{ route('register') }}" class="hidden sm:inline">Register</a>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>


</nav>
