@section('pageTitle', 'Frame Colors')
<div class="container min-h-[80vh] mx-auto px-4 max-w-xl flex flex-col justify-center items-center mt-10">
    <section class="w-full bg-slate-800 rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-extrabold text-gray-100 mb-6 flex items-center justify-center space-x-4">
            <i class="fas fa-palette text-blue-500 text-3xl"></i>
            <span>Manage Frame Colors</span>
        </h1>

        <!-- Add New Color Section -->
        <form wire:submit.prevent="addColor">
            <div class="flex space-x-2 items-center mb-6">
                <input type="text" wire:model="newColor" placeholder="New Frame Color"
                    class="flex-1 px-3 py-2 border border-gray-600 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-150 ease-in-out" />
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Add Color</span>
                </button>
            </div>
        </form>

        @if ($colors->isNotEmpty())
            <!-- List of Colors -->
            <ul class="space-y-2 mb-8">
                @foreach ($colors as $color)
                    <li class="flex items-center justify-between p-2 bg-gray-800 text-white rounded-lg shadow-md">
                        <span>{{ $color->name }}</span>
                        <button wire:click="deleteColor({{ $color->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 flex items-center space-x-2">
                            <i class="fas fa-trash-alt"></i>
                            <span class="text-sm">Delete</span>
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Delete All Button -->
            <div class="flex justify-start">
                <button wire:click="deleteAll"
                    class="border border-red-600 text-red-400 px-4 py-2 mb-6 rounded-lg hover:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 flex items-center space-x-2">
                    <i class="fas fa-trash-alt"></i>
                    <span>Delete All</span>
                </button>
            </div>
        @else
            <p class="text-gray-400 text-center">No colors available</p>
        @endif
    </section>
</div>
