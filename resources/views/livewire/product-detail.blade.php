<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="flex flex-row">
        <img src="{{ asset($product->image_path) }}" alt="Product Image" class="ml-[2vw] mt-[5vh] w-[30vw] h-[70vh]">
        <div class="ml-[5vw] mt-[9vh]">
            <h1 class="font-inter text-[3vw] font-bold">{{ $product->name }}</h1>
            <p class="text-[#37654E] mt-[1vh] text-[1.5vw] mb-4 font-inter">IDR
                {{ number_format($product->price, 0, ',', '.') }}
            </p>
            <h5 class="font-inter mt-[5vh] mb-[-1vh]">Quantity</h5>
            <div class="flex items-center mt-[2vh] mb-[2vh] bg-[#C9F6A7] w-[10vw] h-[5vh] rounded-[1vw]">
                <button wire:click="decrementQuantity"
                    class="px-[1vw] py-[0.5vh] rounded-l-[0.5vw] text-xl font-bold">-</button>

                <div class="px-[2vw] py-[0.5vh] text-center text-xl font-bold">
                    {{ $quantity }}
                </div>

                <button wire:click="incrementQuantity"
                    class="px-[1vw] py-[0.5vh] rounded-r-[0.5vw] text-xl font-bold">+</button>
            </div>

            <p class="font-inter mt-[5vh]">{{ $product->description }}</p>
            <button wire:click="addToCart"
                class="w-[30vw] h-[5vh] bg-[#37654E] text-white flex items-center justify-center font-inter rounded-[1vw] font-bold mt-[10vh]">
                Add to Cart
            </button>

        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('cart-updated', () => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Produk berhasil ditambahkan ke keranjang!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                })
            })
        </script>
    @endpush

</div>
