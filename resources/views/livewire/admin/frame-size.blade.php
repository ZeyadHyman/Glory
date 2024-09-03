@section('pageTitle', 'Frame Sizes')
<div class="container min-h-[80vh] mx-auto px-4 max-w-xl flex flex-col justify-center items-center">
    <section class="w-full bg-slate-800 rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-extrabold text-gray-100 mb-6 flex items-center justify-center space-x-4">
            <i class="fa-solid fa-maximize text-blue-500 text-3xl"></i>
            <span>Manage Frame Sizes</span>
        </h1>

        <!-- Add New Size Section -->
        <form wire:submit.prevent="addSize">
            <div class="flex space-x-2 items-center mb-6">
                <input type="text" wire:model="newSize" placeholder="New Frame Size"
                    class="flex-1 px-3 py-2 border border-gray-600 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-150 ease-in-out" />
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center space-x-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Add Size</span>
                </button>
            </div>
        </form>

        <!-- Delete All Button -->
        @if ($sizes->count())
            <!-- List of Sizes -->
            <ul class="space-y-2">
                @foreach ($sizes as $size)
                    <li class="flex items-center justify-between p-2 bg-gray-800 text-white rounded-lg shadow-md">
                        <span>{{ $size->name }}</span>
                        <button wire:click="deleteSize({{ $size->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 flex items-center space-x-2">
                            <i class="fa-solid fa-trash"></i>
                            <span>Delete</span>
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-start mt-8">
                <button wire:click="deleteAll"
                    class="border border-red-600 text-red-400 px-4 py-2 mb-6 rounded-lg hover:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 flex items-center space-x-2">
                    <i class="fa-solid fa-trash-alt"></i>
                    <span>Delete All</span>
                </button>
            </div>
        @else
            <p class="text-gray-400 text-center">No sizes available</p>
        @endif
    </section>
</div>
