<div class="flex justify-center items-center">
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
    @section('pageTitle', 'Add New Product')
    <div class="mt-10 w-1/2 rounded-xl py-10 px-12 border border-white/50 shadow-xl bg-[#13212E]">
        <form wire:submit.prevent="addProduct">
            <h1 class="text-zinc-50 text-3xl font-bold mb-10">Add New Product</h1>

            <!-- Name and Category  -->
            <div class="flex space-x-5">
                <div class="relative z-0 w-full mb-8 group">
                    <input required autocomplete="off" type="text" name="name" wire:model="name" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <select name="category" wire:model="category_id"
                        class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer
                    {{ $categories ? 'text-white' : 'text-red-500' }}">
                        @if ($categories && $categories->count())
                            <option class="text-slate-800" value="" selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option class="text-slate-800" value="{{ $category->id }}">
                                    {{ $category->name }}

                                </option>
                            @endforeach
                        @else
                            <option selected class="text-red-800" value="" selected>
                                There's No Category Available.
                            </option>
                        @endif
                    </select>
                    <label class="absolute -top-3 flex text-xs justify-between w-full items-center text-gray-400 ">
                        <span>Category</span>
                        <a href="{{ route('addCategory') }}" class="text-blue-500 hover:underline">
                            ADD NEW CATEGORY
                        </a>
                    </label>
                </div>


            </div>

            <!-- Description Input -->
            <div class="relative z-0 w-full mb-8 group">
                <input required autocomplete="off" type="text" name="description" wire:model="description"
                    placeholder=" "
                    class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Description
                </label>
            </div>

            <!-- Price and Discount Inputs -->
            <div class="flex space-x-5">
                <div class="relative z-0 w-full mb-8 group">
                    <input required autocomplete="off" type="text" name="price" wire:model="price" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Price (EGP)
                    </label>
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <input required autocomplete="off" type="text" name="discount" wire:model="discount"
                        placeholder=" "
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
                    <div class="flex justify-between items-end mb-4 border-b-2 border-gray-300 pb-2 uppercase">
                        <h1 class="text-xl font-semibold text-zinc-50">
                            Frame Sizes
                        </h1>
                        <a href="{{ route('EditFrameSizes') }}" class="text-blue-500 text-xs hover:underline">
                            Add New Size
                        </a>
                    </div>
                    @if ($sizes)
                        <div class="flex items-center mb-4">
                            <input id="select_all_sizes" type="checkbox" wire:model="selectAllSizes"
                                wire:click="toggleSizes"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" />
                            <label for="select_all_sizes" class="ml-2 text-gray-400 text-sm uppercase">
                                Select All Sizes
                            </label>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($sizes as $size)
                                <div class="flex items-center space-x-2">
                                    <input id="size_{{ $size->name }}" type="checkbox" name="frame_sizes[]"
                                        value="{{ $size->name }}" wire:model="frame_sizes"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                        @if (in_array($size->name, $frame_sizes)) checked @endif />
                                    <label for="size_{{ $size->name }}"
                                        class="text-gray-400 text-sm uppercase">{{ $size->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-xs">There's No Size Available.
                            <a href="{{ route('EditFrameSizes') }}" class="text-blue-500 hover:underline">Add One</a>
                        </p>
                    @endif
                </div>

                <!-- Frame Colors -->
                <div class="flex-1">
                    <div class="flex justify-between items-end mb-4 border-b-2 border-gray-300 pb-2 uppercase"">
                        <h1 class="text-xl font-semibold text-zinc-50 ">
                            Frame Colors
                        </h1>
                        <a href="{{ route('EditFrameColors') }}" class="text-blue-500 text-xs hover:underline">
                            Add New Color
                        </a>
                    </div>
                    @if ($colors)
                        <div class="flex items-center mb-4">
                            <input id="select_all_colors" type="checkbox" wire:model="selectAllColors"
                                wire:click="toggleColors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" />
                            <label for="select_all_colors" class="ml-2 text-gray-400 text-sm uppercase">Select All
                                Colors</label>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($colors as $color)
                                <div class="flex items-center space-x-2">
                                    <input id="color_{{ $color->name }}" type="checkbox" name="frame_colors[]"
                                        value="{{ $color->name }}" wire:model="frame_colors"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                        @if (in_array($color->name, $frame_colors)) checked @endif />
                                    <label for="color_{{ $color->name }}"
                                        class="text-gray-400 text-sm uppercase">{{ $color->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-xs">There's No Color Available.
                            <a href="{{ route('EditFrameColors') }}" class="text-blue-500 hover:underline">
                                Add One
                            </a>
                        </p>
                    @endif
                </div>
            </div>


            <div class="flex flex-col md:flex-row md:space-x-10 ">
                <!-- Cover Image Upload -->
                <div class="flex-1 relative my-4 md:my-8">
                    <label for="CoverImage" class="text-white flex items-center space-x-2">
                        <i class="fas fa-image"></i>
                        <span>Upload Cover Image</span>
                    </label>
                    <input required id="CoverImage" type="file" wire:model="CoverImage"
                        class="mt-2 w-full border border-gray-600 rounded-lg focus:ring-blue-500 bg-gray-800 text-zinc-50">
                </div>

                <!-- Second Images Upload -->
                <div class="flex-1 relative my-4 md:my-8">
                    <label for="images" class="text-white flex items-center space-x-2">
                        <i class="fas fa-images"></i>
                        <span>Upload Additional Images</span>
                    </label>
                    <input required id="images" type="file" wire:model="images" multiple
                        class="mt-2 w-full border border-gray-600 rounded-lg focus:ring-blue-500 bg-gray-800 text-zinc-50">
                    @error('images.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="images" class="loading-bar absolute top-5 left-0 w-full"></div>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Add Product
            </button>
        </form>
    </div>
</div>
