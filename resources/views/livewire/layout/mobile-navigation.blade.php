@section('script')
    <script></script>
@endsection

<nav class="block lg:hidden fixed w-full bottom-0 justify-center z-50 bg-[#D0D3D5] p-2" id="navbar">
    <div class="grid grid-cols-4 grid-rows-1">

        {{-- Dashboard --}}
        <div
            class="place-self-start ml-7 rounded-full w-9 h-9 mt-1 bg-[#d0d3d53b] flex items-center justify-center transition-all hover:bg-[#9697978f] hover:w-10 hover:h-10">
            <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-clipboard-check text-[26px] text-cyan-900" aria-hidden="true"></i>
            </a>
        </div>

        {{-- Wishlist --}}
        <div
            class="place-self-center rounded-full w-9 h-9 mt-1 bg-[#d0d3d53b] flex items-center justify-center transition-all hover:bg-[#9697978f] hover:w-10 hover:h-10">
            <a href="{{ route('wishlist') }}" class="cursor-pointer">
                @if ($wishlist_count || $wishlist_count_session)
                    <i class="fa-solid fa-heart text-2xl text-red-600 relative">
                        <span
                            class="select-none absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-xs rounded-full text-zinc-50">
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
            </a>
        </div>

        {{-- Cart --}}
        <div
            class="place-self-center rounded-full w-9 h-9 mt-1 bg-[#d0d3d53b] flex items-center justify-center transition-all hover:bg-[#9697978f] hover:w-10 hover:h-10">
            <i class="fa fa-cart-shopping text-2xl text-cyan-900 relative">
                <span
                    class="select-none absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-zinc-50 text-xs rounded-full">
                    @auth
                        {{ $cart_count }}
                    @else
                        {{ $cart_count_session }}
                    @endauth
                </span>
            </i>
        </div>

        {{-- Profile --}}
        <div
            class="place-self-end mr-7 flex mb-1 items-center justify-center transition-all hover:bg-[#9697978f] hover:w-10 hover:h-10 rounded-full h-9 w-9">
            <a href="{{ route('profile') }}">
                @auth
                    @if (Auth::user()->profile_image)
                        <img src="{{ $user_image }}" alt="Profile Image" class="rounded-full w-8 h-8 mt-1 object-cover">
                    @else
                        <i class="fa fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                    @endif
                @else
                    <a href="{{ route('login') }}">
                        <i class="fa-regular fa-user-circle text-3xl text-cyan-900" aria-hidden="true"></i>
                    </a>
                @endauth
            </a>
        </div>

    </div>
</nav>
