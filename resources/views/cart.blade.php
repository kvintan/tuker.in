<x-layout>
    <!-- Header -->
    <div class="bg-[#37654E] text-white w-1/3 mx-auto py-4 rounded-xl shadow-lg mb-10">
        <h1 class="text-3xl font-bold text-center font-inter">Order</h1>
    </div>

    <!-- Product List -->
    <div class="max-w-5xl mx-auto space-y-6 font-inter">
        <!-- Item 1: Apron -->
        <div id="item-apron" class="border-b pb-4 flex items-center gap-4 w-full">
            <div class="w-20 h-20">
                <img src="images/apron.png" alt="Apron" class="w-full h-full object-cover border rounded-2xl" />
            </div>

            <div class="flex-1 font-extrabold text-lg">Apron</div>

            <div class="w-24 text-right font-semibold">25.000</div>

            <div class="flex items-center border rounded px-2 py-1 shadow ml-4">
                <button onclick="updateQty('apron', -1)" class="px-2">−</button>
                <span id="qty-apron" class="px-3">5</span>
                <button onclick="updateQty('apron', 1)" class="px-2">+</button>
            </div>

            <div class="w-24 text-right font-semibold" id="total-apron">125.000</div>

            <button onclick="removeItem('apron')" class="ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-red-500 hover:text-red-700 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 00-2-2H9a2 2 0 00-2 2h10z" />
                </svg>
            </button>
        </div>

        <div class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-center mt-10 gap-6 font-inter">
            <a href="/product" class="bg-[#37654E] hover:bg-[#2a4b3a] text-white font-bold px-6 py-3 rounded-xl flex items-center">
                ← Continue Shopping
            </a>

            <div class="text-center w-1/3">
                <div class="bg-[#37654E] text-white font-bold px-6 py-2 rounded-xl mb-2 font-inter">
                    Cart Total
                </div>
                <div class="text-xl font-semibold">
                    Subtotal &nbsp;&nbsp; <span id="subtotal">150.000</span>
                </div>
                <button class="bg-[#37654E] hover:bg-[#2a4b3a] text-white font-bold px-6 py-3 rounded-xl mt-4">
                    Checkout
                </button>
            </div>
        </div>

        <script>
            const prices = {
                apron: 25000,
                shorts: 25000
            };

            const updateQty = (item, change) => {
                const qtyEl = document.getElementById(`qty-${item}`);
                let qty = parseInt(qtyEl.textContent) + change;
                if (qty < 0) qty = 0;
                qtyEl.textContent = qty;

                const totalEl = document.getElementById(`total-${item}`);
                totalEl.textContent = (qty * prices[item]).toLocaleString('id-ID');

                updateSubtotal();
            };

            const updateSubtotal = () => {
                const qtyApron = parseInt(document.getElementById('qty-apron')?.textContent || 0);
                const qtyShorts = parseInt(document.getElementById('qty-shorts')?.textContent || 0);
                const subtotal = (qtyApron * prices.apron) + (qtyShorts * prices.shorts);
                document.getElementById('subtotal').textContent = subtotal.toLocaleString('id-ID');
            };

            const removeItem = (item) => {
                const itemEl = document.getElementById(`item-${item}`);
                if (itemEl) itemEl.remove();
                updateSubtotal();
            };
        </script>
</x-layout>