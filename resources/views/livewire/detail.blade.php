<div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 px-6 py-10 max-w-6xl mx-auto items-center rounded-xl">
        <!-- Product Image -->
        <div class="w-full">
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                class="w-full h-auto object-cover rounded-lg">
        </div>

        <!-- Product Details -->
        <div class="flex flex-col gap-4">
            <h2 class="text-3xl md:text-4xl font-extrabold font-inter text-black">{{ $product->name }}</h2>
            <p class="text-[#37654E] text-2xl font-semibold font-inter">IDR
                {{ number_format($product->price, 0, ',', '.') }}</p>

            <!-- Quantity selector -->
            <div>
                <p class="mb-2 font-medium">Quantity</p>
                <div class="inline-flex items-center gap-4 bg-[#E5F2DE] px-4 py-2 rounded-full w-fit">
                    <button class="text-xl font-bold text-[#2a4b3a]">−</button>
                    <span class="text-lg font-medium">1</span>
                    <button class="text-xl font-bold text-[#2a4b3a]">+</button>
                </div>
            </div>

            <!-- Product description -->
            <p class="text-gray-700 leading-relaxed font-inter">
                {{ $product->description }}
            </p>

            <!-- Buttons -->
            <div class="flex flex-col gap-3 mt-4 w-full">
                <button
                    class="cursor-pointer bg-[#37654E] hover:bg-[#2a4b3a] text-white font-bold font-inter py-3 rounded-full transition duration-200">
                    Buy Now
                </button>
                <button
                    class="cursor-pointer border border-black hover:bg-gray-100 text-black font-bold font-inter py-3 rounded-full transition duration-200">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

</div>
