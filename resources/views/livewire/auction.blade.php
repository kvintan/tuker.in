<div wire:poll.5s>
    <div class="min-h-screen flex flex-col items-center py-12 px-4">
        <img src="{{ asset('images/imgAuction.png') }}" alt="Auction Banner" class="w-full object-cover rounded-xl mb-8">
        <h1 class="text-4xl font-bold font-inter text-gray-800 mb-4">Auction</h1>

        @if (session()->has('error'))
            <div class="text-red-600 font-semibold mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="text-green-600 font-semibold mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl w-full">
            @foreach ($products as $product)
                @php
                    $highestBid = $product->highestBid?->bid_amount ?? $product->starting_bid;
                    $endTimestamp = \Carbon\Carbon::parse($product->auction_end_time)->timestamp;
                    $isEnded = now()->timestamp > $endTimestamp;
                @endphp

                <div wire:key="product-{{ $product->id }}" x-data="{
                    countdown: {{ $endTimestamp - now()->timestamp }},
                    formatTime(seconds) {
                        let hrs = String(Math.floor(seconds / 3600)).padStart(2, '0');
                        let min = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
                        let sec = String(seconds % 60).padStart(2, '0');
                        return { hrs, min, sec };
                    }
                }" x-init="setInterval(() => { if (countdown > 0) countdown-- }, 1000)"
                    class="bg-white shadow-md rounded-2xl overflow-hidden p-4 w-full max-w-xs border-2 border-black flex flex-col items-center">
                    <img src="{{ isset($product->image_path[0]) ? asset('storage/' . $product->image_path[0]) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" class="w-full h-52 object-cover rounded-xl mb-4">

                    {{-- Countdown Timer --}}
                    <div
                        class="bg-[#E5F2DE] text-green-900 font-semibold py-2 rounded-lg text-sm mb-4 border-2 w-64 border-black">
                        <template x-if="countdown > 0">
                            <div class="grid grid-flow-col auto-cols-max gap-3 justify-center text-center">
                                <template x-for="[label, val] in Object.entries(formatTime(countdown))">
                                    <div class="text-black font-bold px-2 py-1">
                                        <span class="text-3xl" x-text="val"></span>
                                        <span class="text-xs" x-text="label"></span>
                                    </div>
                                </template>
                            </div>
                        </template>

                        <template x-if="countdown <= 0">
                            <p class="text-red-600 font-semibold">Auction Ended</p>
                        </template>
                    </div>

                    {{-- Info Produk --}}
                    <div class="text-left px-4 self-stretch">
                        <h2 class="text-2xl font-bold text-black mb-2">{{ $product->name }}</h2>
                        <p class="text-black mb-1">Current bid: <strong>Rp
                                {{ number_format($highestBid, 0, ',', '.') }}</strong></p>

                        @if ($product->highestBid && $product->highestBid->user)
                            <p class="text-sm text-gray-700">
                                Highest bid: <strong>{{ $product->highestBid->user->name }}</strong>
                            </p>
                        @endif

                        @if ($isEnded)
                            @if ($product->highestBid && $product->highestBid->user_id == auth()->id())
                                <p class="text-green-600 font-bold">🎉 You won!</p>
                            @else
                                <p class="text-gray-500">Auction has ended</p>
                            @endif
                        @else
                            <button wire:click="placeBid({{ $product->id }})"
                                class="bg-green-800 hover:bg-green-700 text-white font-semibold text-base h-9 px-6 py-1 rounded-xl w-full transition duration-200 cursor-pointer mt-3">
                                Bid now + Rp1.000
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
