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
            <div class="flex justify-between">
                <h1 class="text-zinc-50 text-3xl font-bold mb-10">Edit Product [{{ $name }}]</h1>
                <a href="{{ route('product-details', ['productId' => $productId]) }}"
                    class="w-5 h-5 bg-red-500 rounded-full">
                </a>
            </div>
            <form wire:submit.prevent="updateProduct">

                <!-- Name and Category -->
                <div class="flex space-x-5">
                    <!-- Name Input -->
                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="name" wire:model="name"
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Name
                        </label>
                    </div>

                    <!-- Category Input -->
                    <div class="relative z-0 w-full mb-8 group">
                        <select name="category" wire:model="category_id"
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            
                            <option class="text-slate-800" value="" selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option class="text-slate-800" value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
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
                    <!-- Price Input -->
                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="price" wire:model="price" placeholder=" "
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Price (EGP)
                        </label>
                    </div>

                    <!-- Discount Input -->
                    <div class="relative z-0 w-full mb-8 group">
                        <input autocomplete="off" type="text" name="discount" wire:model="discount" placeholder=" "
                            class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Discount (%) <span class="text-xs ml-2 text-red-500">*optional</span>
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

                <!-- Images Section -->
                <div class="mb-4">
                    @php
                        if (is_string($images)) {
                            $images = json_decode($images, true);
                        }
                    @endphp
                    @if (count($images) > 0)
                        <div class="flex flex-wrap gap-4">
                            @foreach ($images as $index => $image)
                                <div class="relative group">
                                    <img src="{{ Storage::url($image) }}" alt="Product Image"
                                        class="w-32 h-32 object-cover rounded-lg shadow-lg transition-transform duration-300 ease-in-out transform group-hover:scale-105 {{ $index === 0 ? 'border-4 border-blue-500' : '' }}">

                                    <!-- Cover Image Label -->
                                    @if ($index === 0)
                                        <span
                                            class="absolute top-1 left-1 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                                            Cover
                                        </span>
                                    @endif

                                    <!-- Delete Image Button -->
                                    <button wire:click="removeImage({{ $index }})"
                                        class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out w-8 h-8 bg-white rounded-full">
                                        <i
                                            class="fa-solid fa-trash-can text-red-500 hover:text-red-700 transition-opacity duration-300 ease-in-out "></i>
                                        <span class="sr-only">Delete Image</span>
                                    </button>

                                    <!-- Make Cover Button (for other images) -->
                                    @if ($index !== 0)
                                        <button wire:click="makeCover({{ $index }})"
                                            class="absolute bottom-2 left-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded hover:bg-blue-700 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">
                                            Make Cover
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-white/60">No images available for this product.</p>
                    @endif
                </div>



                <!-- Upload New Images -->
                <div class="relative z-0 w-full mb-8 group">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload New
                        Images</label>
                    <input type="file" wire:model="newImages" multiple
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        accept="image/*">
                    <div wire:loading wire:target="newImages" class="text-white text-sm mt-2">
                        Uploading... <span class="loading-bar"></span>
                    </div>
                    @error('newImages.*')
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
