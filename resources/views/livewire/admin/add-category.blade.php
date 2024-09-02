<div>
    <style>
        /* Keyframes for the loading bar animation */
        @keyframes loading {
            0% {
                width: 0%;
            }

            20% {
                width: 20%;
            }

            40% {
                width: 40%;
            }

            65% {
                width: 65%;
            }

            80% {
                width: 80%;
            }

            100% {
                width: 100%;
            }
        }

        .loading-bar {
            width: 0%;
            height: 5px;
            margin-left: 5px;
            background-color: #4CAF50;
            animation: loading 7s ease-in-out;
        }
    </style>
    @section('pageTitle', 'Edit Category')
    <div class="flex justify-center items-center min-h-[70vh]">
        <div class="mt-10 w-1/2 rounded-xl py-10 px-12 border border-white/50 shadow-xl bg-[#13212E]">
            <form wire:submit.prevent="addCategory">
                <h1 class="text-zinc-50 text-3xl font-bold mb-10">Add New Category</h1>

                <!-- Name Input -->
                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="name" wire:model="name" placeholder=" " required
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>

                <!-- Image Upload -->
                <div class="relative mb-8">
                    <label for="image" class="text-white flex items-center space-x-2">
                        <i class="fas fa-image"></i>
                        <span>Upload Image</span>
                    </label>
                    <input id="image" type="file" wire:model="image" required
                        class="mt-2 w-full border border-gray-600 rounded-lg focus:ring-blue-500 bg-gray-800 text-zinc-50">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="image" class="loading-bar absolute top-5 left-0 w-full"></div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                    Add Category
                </button>
            </form>
        </div>
    </div>
</div>
