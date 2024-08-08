<div 
    x-data="{ open: false }" 
    x-init="setTimeout(() => open = true, 500)" 
    x-bind:class="open ? 'translate-x-0' : '-translate-x-full'"
    class="bg-gray-800 border-r border-white/20  text-white h-full w-64 fixed top-0 left-0 z-10 transform transition-transform duration-500 -translate-x-full"
>
    <div class="p-4">
        <h2 class="text-xl font-bold">Control Panel</h2>
        <ul class="mt-6 space-y-2">
            <li>
                <a wire:click="setActiveTab('dashboard')" class="{{ $activeTab == 'dashboard' ? 'bg-gray-700' : 'hover:bg-gray-600 transition-all hover:transition-all' }} block p-2 rounded cursor-pointer">
                    Dashboard
                </a>
            </li>
            <li>
                <a wire:click="setActiveTab('users')" class="{{ $activeTab == 'users' ? 'bg-gray-700' : 'hover:bg-gray-600 transition-all hover:transition-all' }} block p-2 rounded cursor-pointer">
                    Users
                </a>
            </li>
            <li>
                <a wire:click="setActiveTab('settings')" class="{{ $activeTab == 'settings' ? 'bg-gray-700' : 'hover:bg-gray-600 transition-all hover:transition-all' }} block p-2 rounded cursor-pointer">
                    Settings
                </a>
            </li>
        </ul>
        {{$activeTab}}
    </div>
</div>
