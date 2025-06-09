<div>

    <div class="min-h-screen flex flex-col items-center py-12 px-4">
        <img src="{{ asset('images/imgAuction.png') }}" alt="Auction Banner" class="w-full object-cover rounded-xl mb-8">
        <h1 class="text-4xl font-bold font-inter text-gray-800 mb-4">Auction</h1>
        <p class="text-lg text-gray-700 text-center max-w-5xl font-inter mb-10">
            Join our auction to bid on high-quality recycled products and sustainable waste management services. Empower
            your community by supporting a circular economy and responsible consumption practices.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl w-full">
            <!-- Auction Item (ntar foreach disini) -->
            <!-- card 1 -->
            <div
                class="bg-white shadow-md rounded-2xl overflow-hidden p-4 w-full max-w-xs border-2 border-black flex flex-col items-center">
                <!-- Gambar Produk -->
                <img src="{{ asset('images/apron.png') }}" alt="Apron"
                    class="w-full h-52 object-cover rounded-xl mb-4">
                <!-- Timer Countdown -->
                <div
                    class="bg-[#E5F2DE] text-green-900 font-semibold py-2 rounded-lg text-sm mb-4 border-2 w-64 border-black">
                    <div class="grid grid-flow-col auto-cols-max gap-3 justify-center text-center">
                        @foreach ([['value' => 10, 'label' => 'hrs'], ['value' => 24, 'label' => 'min'], ['value' => 59, 'label' => 'sec']] as $time)
                            <div
                                class="bg-neutral rounded-lg text-black font-inter font-bold flex flex-col items-center px-2 py-1">
                                <span class="countdown font-inter text-3xl font-extrabold leading-none">
                                    <span style="--value:{{ $time['value'] }};" aria-live="polite"
                                        aria-label="{{ $time['value'] }}">
                                        {{ $time['value'] }}
                                    </span>
                                </span>
                                <span class="text-xs mt-0.5">{{ $time['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Informasi Produk -->
                <div class="text-left pl-4 pr-4 self-stretch">
                    <h2 class="text-2xl font-inter font-bold text-black mb-2">Apron</h2>
                    <p class="text-black mb-4">Current bid: <strong>Rp 9.000</strong></p>
                    <button
                        class="bg-green-800 hover:bg-green-700 text-white font-inter font-semibold text-base h-9 px-6 py-1 rounded-xl w-40 transition duration-200 cursor-pointer">
                        Bid now
                    </button>
                </div>
            </div>
            <!-- card 2 -->
            <div
                class="bg-white shadow-md rounded-2xl overflow-hidden p-4 w-full max-w-xs border-2 border-black flex flex-col items-center">
                <!-- Gambar Produk -->
                <img src="{{ asset('images/apron.png') }}" alt="Apron"
                    class="w-full h-52 object-cover rounded-xl mb-4">
                <!-- Timer Countdown -->
                <div
                    class="bg-[#E5F2DE] text-green-900 font-semibold py-2 rounded-lg text-sm mb-4 border-2 w-64 border-black">
                    <div class="grid grid-flow-col auto-cols-max gap-3 justify-center text-center">
                        @foreach ([['value' => 10, 'label' => 'hrs'], ['value' => 24, 'label' => 'min'], ['value' => 59, 'label' => 'sec']] as $time)
                            <div
                                class="bg-neutral rounded-lg text-black font-inter font-bold flex flex-col items-center px-2 py-1">
                                <span class="countdown font-inter text-3xl font-extrabold leading-none">
                                    <span style="--value:{{ $time['value'] }};" aria-live="polite"
                                        aria-label="{{ $time['value'] }}">
                                        {{ $time['value'] }}
                                    </span>
                                </span>
                                <span class="text-xs mt-0.5">{{ $time['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Informasi Produk -->
                <div class="text-left pl-4 pr-4 self-stretch">
                    <h2 class="text-2xl font-inter font-bold text-black mb-2">Apron</h2>
                    <p class="text-black mb-4">Current bid: <strong>Rp 9.000</strong></p>
                    <button
                        class="bg-green-800 hover:bg-green-700 text-white font-inter font-semibold text-base h-9 px-6 py-1 rounded-xl w-40 transition duration-200 cursor-pointer">
                        Bid now
                    </button>
                </div>
            </div>

            <!-- card 3 -->
            <div
                class="bg-white shadow-md rounded-2xl overflow-hidden p-4 w-full max-w-xs border-2 border-black flex flex-col items-center">
                <!-- Gambar Produk -->
                <img src="{{ asset('images/apron.png') }}" alt="Apron"
                    class="w-full h-52 object-cover rounded-xl mb-4">
                <!-- Timer Countdown -->
                <div
                    class="bg-[#E5F2DE] text-green-900 font-semibold py-2 rounded-lg text-sm mb-4 border-2 w-64 border-black">
                    <div class="grid grid-flow-col auto-cols-max gap-3 justify-center text-center">
                        @foreach ([['value' => 10, 'label' => 'hrs'], ['value' => 24, 'label' => 'min'], ['value' => 59, 'label' => 'sec']] as $time)
                            <div
                                class="bg-neutral rounded-lg text-black font-inter font-bold flex flex-col items-center px-2 py-1">
                                <span class="countdown font-inter text-3xl font-extrabold leading-none">
                                    <span style="--value:{{ $time['value'] }};" aria-live="polite"
                                        aria-label="{{ $time['value'] }}">
                                        {{ $time['value'] }}
                                    </span>
                                </span>
                                <span class="text-xs mt-0.5">{{ $time['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Informasi Produk -->
                <div class="text-left pl-4 pr-4 self-stretch">
                    <h2 class="text-2xl font-inter font-bold text-black mb-2">Apron</h2>
                    <p class="text-black mb-4">Current bid: <strong>Rp 9.000</strong></p>
                    <button
                        class="bg-green-800 hover:bg-green-700 text-white font-inter font-semibold text-base h-9 px-6 py-1 rounded-xl w-40 transition duration-200 cursor-pointer">
                        Bid now
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
