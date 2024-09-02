<div x-data="{ open: true }" class="relative z-10">

    <!-- Sidebar -->
    <div :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="bg-gradient-to-l from-[#13212e] to-[#1a2c3d] border-r border-white/20 text-white h-full w-64 sm:w-48 md:w-64 fixed top-0 left-0 z-10 transform transition-transform duration-300 ease-in-out">
        <div class="p-4">
            <!-- Header -->
            <h2 class="text-lg md:text-xl font-bold flex items-center space-x-2">
                <i class="fas fa-tachometer-alt"></i>
                <span>Control Panel</span>
            </h2>

            <!-- Management Section -->
            <div class="mt-6">
                <h3 class="text-md font-semibold mb-2">Management</h3>
                <ul class="space-y-2">
                    <li>
                        <button wire:click="setActiveTab('products')"
                            class="{{ $activeTab == 'products' ? 'bg-gray-700 text-white' : 'hover:bg-gray-600 transition-all' }} w-full text-start block p-3 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-box"></i>
                            <span>Products</span>
                        </button>
                    </li>
                    <li>
                        <button wire:click="setActiveTab('users')"
                            class="{{ $activeTab == 'users' ? 'bg-gray-700 text-white' : 'hover:bg-gray-600 transition-all' }} w-full text-start block p-3 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </button>
                    </li>

                </ul>
            </div>

            <!-- Customization Section -->
            <div class="mt-6">
                <h3 class="text-md font-semibold mb-2">Customization</h3>
                <ul class="space-y-2">
                    <li>
                        <button wire:click="setActiveTab('categories')"
                            class="{{ $activeTab == 'categories' ? 'bg-gray-700 text-white' : 'hover:bg-gray-600 transition-all' }} w-full text-start block p-3 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </button>
                    </li>

                    <li>
                        <a href="{{ route('EditFrameSizes') }}"
                            class="w-full text-start  p-3 rounded-lg flex items-center space-x-2 hover:bg-gray-600 transition-all">
                            <i class="fa-solid fa-maximize"></i>
                            <span>Frame Sizes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('EditFrameColors') }}"
                            class="w-full text-start  p-3 rounded-lg flex items-center space-x-2 hover:bg-gray-600 transition-all">
                            <i class="fas fa-palette"></i>
                            <span>Frame Colors</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('EditSizeGuideImage') }}"
                            class="w-full text-start  p-3 rounded-lg flex items-center space-x-2 hover:bg-gray-600 transition-all">
                            <i class="fas fa-image"></i>
                            <span>Size Guide</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
