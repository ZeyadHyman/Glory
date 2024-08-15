    <div class="mt-10" x-data="{ openEditModal: false, editItemId: null, open: false, confirmDeleteId: null }">
        @if ($activeTab == 'products')
            <div class="pb-4 flex justify-between">
                <form wire:submit.prevent='handleSearching' class="flex flex-col sm:flex-row items-start sm:items-center">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative w-full sm:w-auto">
                        <input type="text" id="table-search" wire:model.live="search"
                            class="block w-full pt-2 ps-10 text-sm text-white border border-gray-600 rounded-lg sm:w-80 bg-gray-700 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400"
                            placeholder="Search for product">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa fa-search w-4 h-4 text-gray-400" aria-hidden="true"></i>
                        </div>
                    </div>
                </form>

                <div class="flex flex-wrap space-x-2">
                    <button wire:click="sortingBy('id')"
                        class="px-6 py-2 transition-all bg-[#1f815b] hover:bg-[#1f815bd5] border-transparent hover:border-white/50 rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        Reset
                    </button>

                    <button wire:click="sortingBy('price')"
                        class="px-6 py-2 transition-all bg-[#1f815b] hover:bg-[#1f815bd5] border-transparent hover:border-white/50 rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        Sort by Price
                        @if ($sortBy === 'price')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'amount-up' : 'amount-down' }} ml-1"></i>
                        @else
                            <i class="fas fa-sort ml-1"></i>
                        @endif
                    </button>

                    <button wire:click="sortingBy('name')"
                        class="px-6 py-2 transition-all bg-[#1f815b] hover:bg-[#1f815bd5] border-transparent hover:border-white/50 rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        Sort by Name
                        @if ($sortBy === 'name')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'amount-up' : 'amount-down' }} ml-1"></i>
                        @else
                            <i class="fas fa-sort ml-1"></i>
                        @endif
                    </button>

                    <button wire:click="sortingBy('category')"
                        class="px-6 py-2 transition-all bg-[#1f815b] hover:bg-[#1f815bd5] border-transparent hover:border-white/50 rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        Sort by Category
                        @if ($sortBy === 'category')
                            <i
                                class="fas fa-sort-{{ $sortDirection === 'asc' ? 'amount-up' : 'amount-down' }} ml-1"></i>
                        @else
                            <i class="fas fa-sort ml-1"></i>
                        @endif
                    </button>

                    <button
                        class="px-6 py-2 transition-all border-x-4 border-[#1f815b] hover:border-[#1f814567] rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>

            </div>

            @if ($data->isNotEmpty())
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="min-w-full text-sm text-left rtl:text-right text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            @php
                                $attributes = $data->first()->getAttributes();
                                $filteredAttributes = array_filter(
                                    $attributes,
                                    fn($key) => !in_array($key, ['created_at', 'updated_at']),
                                    ARRAY_FILTER_USE_KEY,
                                );
                            @endphp

                            <tr>
                                @foreach ($filteredAttributes as $key => $attribute)
                                    <th scope="col" class="px-4 sm:px-6 py-3">
                                        {{ ucfirst($key) }}
                                    </th>
                                @endforeach
                                <th scope="col" class="px-4 sm:px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                                    @php
                                        $filteredAttributes = array_filter(
                                            $product->getAttributes(),
                                            fn($key) => !in_array($key, ['created_at', 'updated_at']),
                                            ARRAY_FILTER_USE_KEY,
                                        );
                                    @endphp

                                    @foreach ($filteredAttributes as $value)
                                        <td class="px-4 sm:px-6 py-3">
                                            {{ $value }}
                                        </td>
                                    @endforeach
                                    <td
                                        class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <button class="text-cyan-500 hover:text-cyan-700">Edit</button>
                                        <button class="text-red-500 hover:text-red-700"
                                            @click="open = true; confirmDeleteId = '{{ $product->id }}'">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            @else
                <p class="text-zinc-50 text-xl sm:text-2xl lg:text-4xl text-center">No products found.</p>
            @endif
        @elseif($activeTab == 'users')
            <div class="pb-4 flex justify-between">
                <form wire:submit.prevent='handleSearching'
                    class="flex flex-col sm:flex-row items-start sm:items-center">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative w-full sm:w-auto">
                        <input type="text" id="table-search" wire:model.live="search"
                            class="block w-full pt-2 ps-10 text-sm text-white border border-gray-600 rounded-lg sm:w-80 bg-gray-700 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400"
                            placeholder="Search for user">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa fa-search w-4 h-4 text-gray-400" aria-hidden="true"></i>
                        </div>
                    </div>
                </form>
            </div>

            @if ($data->isNotEmpty())
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="min-w-full text-sm text-left rtl:text-right text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            @php
                                $attributes = $data->first()->getAttributes();
                                $filteredAttributes = array_filter(
                                    $attributes,
                                    fn($key) => !in_array($key, [
                                        'created_at',
                                        'updated_at',
                                        'remember_token',
                                        'profile_image_changed',
                                        'email_verified_at',
                                        'profile_image',
                                        'password',
                                    ]),
                                    ARRAY_FILTER_USE_KEY,
                                );
                            @endphp

                            <tr>
                                @foreach ($filteredAttributes as $key => $attribute)
                                    <th scope="col" class="px-4 sm:px-6 py-3">
                                        {{ ucfirst($key) }}
                                    </th>
                                @endforeach
                                <th scope="col" class="px-4 sm:px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                                    @php
                                        $filteredAttributes = array_filter(
                                            $product->getAttributes(),
                                            fn($key) => !in_array($key, [
                                                'created_at',
                                                'updated_at',
                                                'remember_token',
                                                'profile_image_changed',
                                                'email_verified_at',
                                                'profile_image',
                                                'password',
                                            ]),
                                            ARRAY_FILTER_USE_KEY,
                                        );
                                    @endphp

                                    @foreach ($filteredAttributes as $value)
                                        <td class="px-4 sm:px-6 py-3">
                                            {{ $value }}
                                        </td>
                                    @endforeach
                                    <td
                                        class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <button class="text-cyan-500 hover:text-cyan-700"
                                            @click="openEditModal = true; userId = @js($product->id)">
                                            Edit Role
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            @else
                <p class="text-zinc-50 text-xl sm:text-2xl lg:text-4xl text-center">No Users found. </p>
            @endif
        @endif

        <!-- Confirmation Dialog -->
        <div x-show="open" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 text-zinc-50 z-[99]">
            <div class="bg-red-800/80 rounded-lg p-6 max-w-sm mx-auto">
                <h3 class="text-lg font-bold mb-4">Are you sure?</h3>
                <p class="mb-6">Are you sure you want to delete this item? This action cannot be undone.</p>
                <div class="flex justify-end space-x-4">
                    <button @click="open = false"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                    <button @click="$wire.deleteItem(confirmDeleteId); open = false;"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="openEditModal" x-cloak
            class="fixed p-10 inset-0 flex items-center justify-center bg-black/50 text-zinc-50 z-[99]">
            <div class="bg-gray-800/90 rounded-lg p-6 max-w-sm mx-auto">
                <h3 class="text-lg font-bold mb-4">Enter New Role</h3>
                <form wire:submit.prevent="updateItem(userId)">
                    <div class="mb-4">
                        <input wire:model.live='newUserRole'
                            class="block w-full mt-1 text-gray-800 border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button @click="openEditModal = false"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
