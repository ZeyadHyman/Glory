<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;
use App\Models\SocialLogin;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

new class extends Component {
    public string $user_image = '';
    public $wishlist_count = 0;
    public $cart_count = 0;
    public $cart_count_session;
    public $wishlist_count_session;

    public function mount()
    {
        $cart = Session::get('cart', []);
        $this->cart_count_session = count($cart);

        $wishlist = Session::get('wishlist', []);
        $this->wishlist_count_session = count($wishlist);

        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }

    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
};
?>




@section('script')
    <script></script>
@endsection


<nav class="block lg:hidden fixed w-full bottom-0 justify-center z-50 bg-[#D0D3D5] p-2" id="navbar">
    <div class="grid grid-cols-4 grid-rows-1">

        {{-- Dashboard --}}
        <div class="place-self-start ml-7 rounded-full w-9 h-9 bg-[#d0d3d53b] flex items-center justify-center">
            <a href={{ route('dashboard') }}>
                <i class="fa-solid fa-clipboard-check text-2xl text-cyan-900 relative" aria-hidden="true"></i>
            </a>
        </div>


        {{-- Wishlist --}}
        <div class="place-self-center rounded-full w-9 h-9 mt-1 bg-[#d0d3d53b] flex items-center justify-center">
            @if ($wishlist_count || $wishlist_count_session)
                <i class="fa-solid fa-heart text-2xl text-red-600 relative">
                    <span
                        class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-xs rounded-full text-zinc-50">
                        @auth
                            {{ $wishlist_count }}
                        @else
                            {{ $wishlist_count_session }}
                        @endauth
                    </span>
                </i>
            @else
                <i class="fa-regular fa-heart text-2xl text-cyan-900 relative">
                    <span
                        class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-xs rounded-full text-zinc-50">
                        0
                    </span>
                </i>
            @endif
        </div>

        {{-- Cart --}}
        <div class="place-self-center rounded-full w-9 h-9 mt-1 bg-[#d0d3d53b] flex items-center justify-center">
            <i class="fa fa-cart-shopping text-2xl  text-cyan-900 relative" aria-hidden="true">
                <span
                    class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-zinc-50 text-xs rounded-full">
                    @auth
                        {{ $cart_count }}
                    @else
                        {{ $cart_count_session }}
                    @endauth
                </span>
            </i>
        </div>

        {{-- Profile --}}
        <div class="place-self-end mr-7 mb-1 flex items-center justify-center">
            <a href={{ route('profile') }}>
                @auth
                    @if (Auth::user()->profile_image)
                        <img src="{{ $user_image }}" alt="Profile Image" class="rounded-full w-8 h-8 mt-1 object-cover">
                    @else
                        <i class="fa fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                    @endif
                @else
                    <a href="{{ route('login') }}">
                        <i class="fa-regular fa-user-circle text-3xl text-cyan-900 mr-2 sm:translate-x-[128px] sm:group-hover:translate-x-0 sm:transition-all"
                            aria-hidden="true">
                        </i>
                    </a>
                @endauth
            </a>
        </div>

    </div>
</nav>
