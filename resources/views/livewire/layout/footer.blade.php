

<div class="mb-14 lg:mb-0 mt-20" id='test'>
    <!-- Contact and Social Links Section -->
    <div
        class="px-5 w-full text-center text-zinc-50 py-10 text-base bg-[#0c151d] flex flex-col lg:flex-row lg:justify-between lg:items-center lg:px-20">
        <!-- Mobile Logo -->
        <div class="flex justify-center items-center lg:hidden mb-10">
            <img src="{{ asset('images/glory_logo_white.png') }}" alt="Glory Logo" class="w-32 h-auto">
        </div>

        <!-- Social Links -->
        <div class="flex flex-col items-center lg:items-start lg:w-1/3 space-y-3 mb-6 lg:mb-0">
            <h1 class="font-bold text-2xl block lg:hidden">Contact Us</h1>
            <h1 class="flex items-center">
                <i class="fa-brands fa-whatsapp mr-2 text-white font-bold text-2xl" aria-hidden="true"></i>
                <a target="_blank" rel="noopener noreferrer"
                    href="https://api.whatsapp.com/send/?phone=201159289796&text&type=phone_number&app_absent=0"
                    class="underline hover:text-zinc-50/80">
                    Whatsapp
                </a>
            </h1>
            <h1 class="flex items-center">
                <i class="fa-brands fa-facebook-f mr-4 text-white font-bold text-2xl" aria-hidden="true"></i>
                <a target="_blank" rel="noopener noreferrer" href="#" class="underline hover:text-zinc-50/80">
                    Facebook
                </a>
            </h1>
            <h1 class="flex items-center">
                <i class="fa-brands fa-instagram mr-2 text-white font-bold text-2xl" aria-hidden="true"></i>
                <a target="_blank" rel="noopener noreferrer" href="#" class="underline hover:text-zinc-50/80">
                    Instagram
                </a>
            </h1>
        </div>

        <!-- Desktop Logo -->
        <div class="justify-center items-center hidden lg:flex mb-6 lg:mb-0">
            <img src="{{ asset('images/glory_logo_white.png') }}" alt="Glory Logo" class="w-56 h-auto">
        </div>

        <!-- Contact Information -->
        <div class="flex flex-col items-center lg:items-end lg:w-1/3 space-y-3 mb-6 lg:mb-0">
            <h1 class="font-bold text-2xl hidden lg:block">Contact Us</h1>
            <h1 class="flex items-center justify-start lg:justify-end">
                <i class="fa fa-phone mr-2 text-xl" aria-hidden="true"></i>
                (+20) 111 111 1111
            </h1>
            <h1 class="flex items-center justify-start lg:justify-end">
                <i class="fa fa-envelope mr-2 text-xl" aria-hidden="true"></i>
                glory@gmail.com
            </h1>
        </div>
    </div>

    <!-- Footer Slogan Section -->
    <div class="w-full text-center text-zinc-50 bg-[#0c151d] flex justify-between items-center">
        <div class="w-full h-10 flex">
            <div class="w-1/2 h-full bg-white/80" style="clip-path: polygon(0 0, 80% 0, 100% 100%, 0 100%);"></div>
        </div>
        <div class="w-full h-10 flex justify-center">
            <img src="{{ asset('images/slogan_arabic.png') }}" alt="Slogan" class="w-52 h-auto">
        </div>
        <div class="w-full h-10 flex justify-end">
            <div class="w-1/2 h-full bg-white/80" style="clip-path: polygon(20% 0, 100% 0%, 100% 100%, 0 100%);"></div>
        </div>
    </div>
</div>
