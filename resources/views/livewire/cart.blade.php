<div>
    <!-- Header -->
    <div class="bg-[#37654E] text-white w-1/3 mx-auto py-4 rounded-xl shadow-lg mb-10">
        <h1 class="text-3xl font-bold text-center font-inter">Order</h1>
    </div>

    <!-- Product List -->
    <div class="max-w-5xl mx-auto space-y-6 font-inter">
        @foreach ($cartItems as $item)
            @php $key = 'cart-' . $item['product_id']; @endphp
            <div class="border-b pb-4 flex items-center gap-4 w-full">
                <div class="w-20 h-20">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                        class="w-full h-full object-cover border rounded-2xl" />
                </div>

                <div class="flex-1 font-extrabold text-lg">{{ $item['name'] }}</div>

                <div class="w-24 text-right font-semibold">{{ number_format($item['unit_amount'], 0, ',', '.') }}</div>

                <div class="flex items-center border rounded px-2 py-1 shadow ml-4">
                    <button wire:click="decrement('{{ $item['product_id'] }}')" class="px-2">−</button>
                    <span class="px-3">{{ $item['quantity'] }}</span>
                    <button wire:click="increment('{{ $item['product_id'] }}')" class="px-2">+</button>
                </div>

                <div class="w-24 text-right font-semibold">
                    {{ number_format($item['total_amount'], 0, ',', '.') }}
                </div>

                <button wire:click="remove('{{ $item['product_id'] }}')" class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 text-red-500 hover:text-red-700 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 00-2-2H9a2 2 0 00-2 2h10z" />
                    </svg>
                </button>
            </div>
        @endforeach

        <!-- Summary -->
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-center mt-10 gap-6 font-inter">
            <a href="/product"
                class="bg-[#37654E] hover:bg-[#2a4b3a] text-white font-bold px-6 py-3 rounded-xl flex items-center">
                ← Continue Shopping
            </a>

            <div class="text-center w-1/3">
                <div class="bg-[#37654E] text-white font-bold px-6 py-2 rounded-xl mb-2 font-inter">
                    Cart Total
                </div>
                <div class="text-xl font-semibold">
                    Subtotal &nbsp;&nbsp; <span>{{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>
                <a href="/checkout" wire:navigate>
                    <button class="bg-[#37654E] hover:bg-[#2a4b3a] text-white font-bold px-6 py-3 rounded-xl mt-4">
                        Checkout
                    </button>
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('cart-item-deleted', () => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Produk berhasil dihapus dari keranjang!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                })
            })
        </script>
    @endpush

</div>
