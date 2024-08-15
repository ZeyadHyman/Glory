<div x-data="{ open: false }" 
     x-init="setTimeout(() => open = true, 500)" 
     x-bind:class="open ? 'translate-x-0' : '-translate-x-full'"
     class="bg-gradient-to-l from-[#13212e94] to-[#1a2c3d94] border-r border-white/20 text-white h-full w-64 sm:w-48 md:w-64 fixed top-0 left-0 z-10 transform transition-transform duration-500 -translate-x-full">
    <div class="p-4">
        <h2 class="text-lg md:text-xl font-bold">Control Panel</h2>
        <ul class="mt-6 space-y-2">
            <li>
                <button wire:click="setActiveTab('products')"
                    class="{{ $activeTab == 'products' ? 'bg-gray-700' : 'hover:bg-gray-600 transition-all hover:transition-all' }} w-full text-start block p-2 rounded cursor-pointer">
                    Products
                </button>
            </li>
            <li>
                <button wire:click="setActiveTab('users')"
                    class="{{ $activeTab == 'users' ? 'bg-gray-700' : 'hover:bg-gray-600 transition-all hover:transition-all' }} w-full text-start block p-2 rounded cursor-pointer">
                    Users
                </button>
            </li>
        </ul>
    </div>
</div>
