<div class="mb-14 lg:mb-0 ">
    <!-- Contact and Social Links Section -->
    <div class="px-5 w-full text-center text-zinc-50 py-10 text-base bg-[#0c151d] flex flex-col lg:flex-row lg:justify-between lg:items-center lg:px-20">
        <!-- Contact Information -->
        <div class="flex flex-col lg:w-1/3 text-start space-y-3 mb-6 lg:mb-0">
            <h1 class="font-bold text-xl">Contact Us</h1>
            <h1 class="flex items-center">
                <i class="fa fa-phone mr-2 text-xl" aria-hidden="true"></i>
                (+20) 111 111 1111
            </h1>
            <h1 class="flex items-center">
                <i class="fa fa-envelope mr-2 text-xl" aria-hidden="true"></i>
                glory@gmail.com
            </h1>
        </div>

        <!-- Desktop Logo -->
        <div class="justify-center items-center hidden lg:flex mb-6 lg:mb-0">
            <img src="{{ asset('images/glory_logo_white.png') }}" alt="Glory Logo" class="w-56 h-auto">
        </div>

        <!-- Social Links -->
        <div class="flex flex-col lg:w-1/3 text-end lg:items-end space-y-3">
            <h1 class="flex items-center">
                <i class="fa-brands fa-whatsapp mr-2 text-green-500 font-bold text-2xl" aria-hidden="true"></i>
                <a href="https://api.whatsapp.com/send/?phone=201159289796&text&type=phone_number&app_absent=0" class="underline hover:text-zinc-50/80">
                    Whatsapp
                </a>
            </h1>
            <h1 class="flex items-center">
                <i class="fa-brands fa-facebook-f mr-4 text-blue-500 font-bold text-2xl" aria-hidden="true"></i>
                <a href="#" class="underline hover:text-zinc-50/80">
                    Facebook
                </a>
            </h1>
            <h1 class="flex items-center">
                <i class="fa-brands fa-instagram mr-2 text-pink-800 font-bold text-2xl" aria-hidden="true"></i>
                <a href="#" class="underline hover:text-zinc-50/80">
                    Instagram
                </a>
            </h1>
        </div>

        <!-- Mobile Logo -->
        <div class="flex justify-center items-center lg:hidden mt-10">
            <img src="{{ asset('images/glory_logo_white.png') }}" alt="Glory Logo" class="w-32 h-auto">
        </div>
    </div>

    <!-- Footer Slogan Section -->
    <div class="w-full text-center text-zinc-50 bg-[#0c151d] flex justify-between items-center">
        <div class="w-full h-16 flex">
            <div class="w-1/2 h-full bg-white/80" style="clip-path: polygon(0 0, 80% 0, 100% 100%, 0 100%);"></div>
        </div>
        <div class="w-full h-16 flex justify-center">
            <img src="{{ asset('images/slogan_arabic.png') }}" alt="Slogan" class="w-60 h-auto">
        </div>
        <div class="w-full h-16 flex justify-end">
            <div class="w-1/2 h-full bg-white/80" style="clip-path: polygon(20% 0, 100% 0%, 100% 100%, 0 100%);"></div>
        </div>
    </div>
</div>
