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
    @section('pageTitle', 'Edit Product')
    <div class="flex justify-center items-center">
        <div class="mt-10 w-1/2 rounded-xl py-10 px-12 border border-white/50 shadow-xl bg-[#13212E]">
            <form wire:submit.prevent="updateProduct">
                <h1 class="text-zinc-50 text-3xl font-bold mb-10">Edit Product [{{ $name }}]</h1>

                <!-- Name and Category -->
                <div class="flex space-x-5">
                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="name" wire:model="name"
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Name
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-8 group">
                        <select name="category" wire:model="category"
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option class="text-slate-800" value="" selected>Select a category</option>
                            <option class="text-slate-800" value="players">Player</option>
                            <option class="text-slate-800" value="clubs">Clubs</option>
                            <option class="text-slate-800" value="t-shirt">T-shirt</option>
                            <option class="text-slate-800" value="movies">Movies & Series</option>
                            <option class="text-slate-800" value="cars">Cars</option>
                            <option class="text-slate-800" value="anime">Anime</option>
                        </select>
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Category
                        </label>
                    </div>
                </div>

                <!-- Description Input -->
                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="description" wire:model="description" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Description
                    </label>
                </div>

                <!-- Price and Discount Inputs -->
                <div class="flex space-x-5">
                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="price" wire:model="price" placeholder=" "
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Price (EGP)
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="discount" wire:model="discount" placeholder=" "
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Discount (%) <span class="text-xs ml-2 text-red-500">*optionally</span>
                        </label>
                    </div>
                </div>

                <!-- Frame Sizes and Colors -->
                <div class="flex space-x-10 mb-8">
                    <!-- Frame Sizes -->
                    <div class="flex-1">
                        <h1 class="text-xl font-semibold text-zinc-50 mb-4 border-b-2 border-gray-300 pb-2">Frame Sizes
                        </h1>
                        <div class="flex items-center mb-4">
                            <input id="select_all_sizes" type="checkbox" wire:model="selectAllSizes"
                                wire:click="toggleSizes" class="mr-2" />
                            <label for="select_all_sizes" class="text-zinc-50 text-sm">Select All</label>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach (['small', 'medium', 'large', 'xlarge'] as $size)
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" wire:model="frame_sizes" value="{{ $size }}"
                                        class="form-checkbox text-blue-600" />
                                    <label class="text-zinc-50 text-sm">{{ ucfirst($size) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Frame Colors -->
                    <div class="flex-1">
                        <h1 class="text-xl font-semibold text-zinc-50 mb-4 border-b-2 border-gray-300 pb-2">Frame Colors
                        </h1>
                        <div class="flex items-center mb-4">
                            <input id="select_all_colors" type="checkbox" wire:model="selectAllColors"
                                wire:click="toggleColors" class="mr-2" />
                            <label for="select_all_colors" class="text-zinc-50 text-sm">Select All</label>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach (['red', 'blue', 'green', 'black', 'white'] as $color)
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" wire:model="frame_colors" value="{{ $color }}"
                                        class="form-checkbox text-blue-600" />
                                    <label class="text-zinc-50 text-sm">{{ ucfirst($color) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- Image  -->
                <div class="mb-4">
                    @if (count($images) > 0)
                        <div class="flex flex-wrap gap-4">
                            @foreach ($images as $index => $image)
                                <div class="relative">
                                    <img src="{{ Storage::url($image) }}" alt="Product Image"
                                        class="w-32 h-32 object-cover">
                                    <button type="button" wire:click="deleteImage({{ $index }})"
                                        class="absolute top-0 right-0 bg-red-600 text-white w-8 h-8 rounded-full">
                                        &times;
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-400">No images available.</p>
                    @endif
                </div>
                <div class="mb-8 relative">
                    <input type="file" wire:model="newImages" multiple
                        class="block text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    @error('newImages.*')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="newImages" class="loading-bar absolute top-5 left-0 w-full"></div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update Product
                </button>
            </form>
        </div>
    </div>
</div>
