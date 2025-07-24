<div>
    <img src="{{ asset('images/productBanner.png') }}" alt="" class="w-full object-cover mb-28">
    <h1 class="font-inter font-extrabold text-6xl">Product</h1>

    <!-- card product -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10">
        @foreach ($products as $product)
            <a href="/product/{{ $product->slug }}">
                <div
                    class="bg-white shadow-md rounded-2xl overflow-hidden p-4 w-full border-2 border-black flex flex-col items-center hover:shadow-lg transition min-h-[400px]">

                    @php
                        $imagePath = $product->image_path ?? '';
                        $imageUrl =
                            Str::startsWith($imagePath, 'products/') || Str::startsWith($imagePath, 'uploads/')
                                ? asset('storage/' . $imagePath)
                                : asset('images/' . $imagePath);
                    @endphp

                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}"
                        class="w-full h-[35vh] object-cover rounded-xl mb-4">

                    <div class="text-center">
                        <h2 class="text-xl font-inter font-bold text-black mb-2 hover:underline">{{ $product->name }}
                        </h2>
                        <p class="text-black mb-1 font-inter">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
