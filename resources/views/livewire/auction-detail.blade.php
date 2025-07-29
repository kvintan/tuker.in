<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto sm:h-[70vh]">
    <h1 class="text-4xl font-bold text-slate-500">Auction Details</h1>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-5">
        <!-- Winner -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Winner</p>
                    <div class="mt-1 text-gray-800">
                        {{ $product->highestBid->user->name ?? '-' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Auction End Date -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    📅
                </div>
                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Ended At</p>
                    <h3 class="text-xl font-medium text-gray-800">
                        {{ \Carbon\Carbon::parse($product->auction_end_time)->format('d-m-Y H:i') }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- Winning Bid -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    💰
                </div>
                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Winning Bid</p>
                    <h3 class="text-xl font-medium text-gray-800">
                        {{ Number::currency($product->current_bid, 'IDR') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Grid -->

    <!-- Product & Bid Summary -->
    <div class="flex flex-col md:flex-row lg:gap-4 mt-4">
        <!-- Bid History -->
        <div class="relative w-full md:w-[65%]">
            <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                <h2 class="text-xl font-semibold mb-4">Bid History</h2>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left font-semibold">User</th>
                            <th class="text-left font-semibold">Bid Amount</th>
                            <th class="text-left font-semibold">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->bids->sortByDesc('created_at') as $bid)
                            <tr>
                                <td class="py-2">{{ $bid->user->name ?? 'Unknown' }}</td>
                                <td>{{ Number::currency($bid->bid_amount, 'IDR') }}</td>
                                <td class="text-sm text-gray-500">{{ $bid->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product Summary -->
        <div class="relative w-full md:w-[35%]">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Product Summary</h2>

                <!-- ✅ Display Product Image -->
                <div class="flex justify-center mb-4">
                    @php
                        $imagePath = $product->image_path ?? '';
                        $imageUrl = $imagePath
                        ? (Str::startsWith($imagePath, 'products/') ||
                        Str::startsWith($imagePath, 'uploads/')
                        ? asset('storage/' . $imagePath)
                        : asset('images/' . $imagePath))
                        : asset('images/default.png');
                    @endphp
                    <img class="rounded-lg max-h-[200px] object-contain"
                        src="{{ $imageUrl }}"
                        alt="{{ $product->name }}">
                </div>

                <!-- ✅ Product Details -->
                <div class="flex flex-col space-y-2">
                    <div class="flex justify-between">
                        <span>Name</span>
                        <span>{{ $product->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Description</span>
                        <span>{{ Str::limit($product->description, 30) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Starting Bid</span>
                        <span>{{ Number::currency($product->starting_bid, 'IDR') }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between font-semibold">
                        <span>Final Bid</span>
                        <span>{{ Number::currency($product->current_bid, 'IDR') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
