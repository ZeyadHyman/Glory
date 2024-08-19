<div class="container mx-auto p-4">
    <div x-data="{ openEditModal: false, editItemId: null, open: false, confirmDeleteId: null }">
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
                    @foreach (['id' => 'Reset', 'price' => 'Sort by Price', 'name' => 'Sort by Name', 'category' => 'Sort by Category'] as $sort => $label)
                        <button wire:click.prevent="sortingBy('{{ $sort }}')"
                            class="px-6 py-2 transition-all bg-[#1f815b] hover:bg-[#1f815bd5] border-transparent hover:border-white/50 rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                            {{ $label }}
                            @if ($sort === 'id')
                            @else
                                @if ($sortBy === $sort)
                                    <i
                                        class="fas fa-sort-{{ $sortDirection === 'asc' ? 'amount-up' : 'amount-down' }} ml-1"></i>
                                @else
                                    <i class="fas fa-sort ml-1"></i>
                                @endif
                            @endif
                        </button>
                    @endforeach

                    <a href="{{ route('addProduct') }}"
                        class="px-6 py-2 transition-all border-x-4 border-[#1f815b] hover:border-[#1f814567] rounded-lg text-white flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            @if ($data->isNotEmpty())
                <div class="relative overflow-x-auto sm:rounded-lg bg-gray-800 mb-5">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            @php
                                $attributes = $data->first()->getAttributes();
                                $filteredAttributes = array_filter(
                                    $attributes,
                                    fn($key) => !in_array($key, ['created_at', 'updated_at', 'images']),
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
                                            fn($key) => !in_array($key, ['created_at', 'updated_at', 'images']),
                                            ARRAY_FILTER_USE_KEY,
                                        );
                                    @endphp

                                    @foreach ($filteredAttributes as $value)
                                        <td class="px-4 sm:px-6 py-3 overflow-hidden text-ellipsis">
                                            {{ $value }}
                                        </td>
                                    @endforeach
                                    <td
                                        class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <a href="{{ route('editProduct', ['productId' => $product->id]) }}"
                                            class="text-cyan-500 hover:text-cyan-700">Edit</a>
                                        <button class="text-red-500 hover:text-red-700"
                                            @click="open = true; confirmDeleteId = '{{ $product->id }}'">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $data->links() }}
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
                <div class="relative sm:rounded-lg bg-gray-800 mb-5">
                    <table class="w-full text-sm text-left text-gray-400">
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
                            @foreach ($data as $user)
                                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                                    @php
                                        $filteredAttributes = array_filter(
                                            $user->getAttributes(),
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
                                        <td class="px-4 sm:px-6 py-3 overflow-hidden text-ellipsis">
                                            {{ $value }}
                                        </td>
                                    @endforeach
                                    <td
                                        class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <button class="text-cyan-500 hover:text-cyan-700"
                                            @click="openEditModal = true; editItemId = '{{ $user->id }}'">
                                            Edit Role
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $data->links() }}
            @else
                <p class="text-zinc-50 text-xl sm:text-2xl lg:text-4xl text-center">No Users found.</p>
            @endif
        @endif

        <!-- Confirmation Dialog -->
        <div x-show="open" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
            <div class="bg-gray-900 p-6 rounded-lg w-11/12 sm:w-1/3">
                <h3 class="text-lg font-semibold text-white">Confirm Delete</h3>
                <p class="mt-2 text-gray-400">Are you sure you want to delete this item?</p>
                <div class="mt-4 flex justify-end space-x-2">
                    <button @click="open = false"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg">Cancel</button>
                    <button @click="$wire.deleteItem(confirmDeleteId); open = false"
                        class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg">Delete</button>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="openEditModal" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
            <div class="bg-gray-900 p-6 rounded-lg w-11/12 sm:w-1/3">
                <h3 class="text-lg font-semibold text-white">Edit User Role</h3>
                <form wire:submit.prevent="updateUserRole" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="role" class="text-gray-400">Role</label>
                        <select id="role" wire:model="userRole" name="role"
                            class="block w-full mt-1 px-3 py-2 text-sm text-gray-900 border border-gray-600 rounded-lg bg-gray-700 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button @click="openEditModal = false"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
