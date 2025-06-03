<x-layout>
    <img src="{{ asset('images/productBanner.png') }}" alt="" class="w-full object-cover mb-28">
    <h1 class="font-inter font-extrabold text-6xl">Product</h1>

    <!-- card product -->
    <div class="grid grid-cols-4 mt-10">
        @foreach ($products as $product)
        <a href="{{ route('product.show', $product->slug) }}">
            <div class="flex flex-col items-center mb-10">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                <div class="text-center">
                    <h2 class="text-xl font-inter font-bold text-black mb-2 hover:underline">{{ $product->name }}</h2>
                    <p class="text-black mb-4 font-inter">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</x-layout>