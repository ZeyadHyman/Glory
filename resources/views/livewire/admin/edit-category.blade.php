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
                width: 97%;
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
            <div class="flex justify-between">
                <h1 class="text-zinc-50 text-3xl font-bold mb-10">Edit Category [{{ $name }}]</h1>
            </div>
            <form wire:submit.prevent="updateCategory">

                <!-- Name Input -->
                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="name" wire:model="name"
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>

                <!-- Image Section -->
                <div class="mb-4 ">
                    @if ($image || $newImage)
                        <div class="relative group mb-4">
                            <img src="{{ $newImage ? $newImage->temporaryUrl() : Storage::url($image) }}"
                                alt="Category image" class="w-full h-full object-fill rounded-lg shadow-lg">
                        </div>
                    @else
                        <p class="text-white/60">No image available for this category.</p>
                    @endif
                </div>

                <!-- Upload New Image -->
                <div class="relative z-0 w-full mb-8 group">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload New
                        Image</label>
                    <input type="file" wire:model="newImage"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        accept="image/*">
                    <div wire:loading wire:target="newImage" class="text-white text-sm mt-2">
                        Uploading... <span class="loading-bar"></span>
                    </div>
                    @error('newImage')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Save Button -->
                <div class="w-full flex justify-between">
                    <div class="text-sm text-gray-500 opacity-100 transition-opacity duration-500 ease-in-out">
                        {{ session('message') }}
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
