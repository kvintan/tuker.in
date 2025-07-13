<div class="p-8 min-h-screen bg-gradient-to-br">
    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-4xl font-extrabold text-gray-800">My Orders</h1>
        <select wire:model="filter"
            class="border border-gray-300 text-sm rounded-lg shadow-sm focus:ring-slate-500 focus:border-slate-500 px-3 py-2">
            <option value="product">Product Orders</option>
            <option value="auction">Auction Orders</option>
            <option value="pickup">Pickup Requests</option>
        </select>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-xl">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-900 text-white text-xs uppercase">
                @if ($isPickup)
                    <tr>
                        <th class="px-6 py-3 text-left">Waste Type</th>
                        <th class="px-6 py-3 text-center">Weight (KG)</th>
                        <th class="px-6 py-3 text-center">Pickup Date</th>
                        <th class="px-6 py-3 text-left">Address</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-left">Rejection Reason</th>
                    </tr>
                @elseif($isAuction)
                    <tr>
                        <th class="px-6 py-3 text-left">Auction ID</th>
                        <th class="px-6 py-3 text-center">Date</th>
                        <th class="px-6 py-3 text-center">Current Bid</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                @else
                    <tr>
                        <th class="px-6 py-3 text-left">Order ID</th>
                        <th class="px-6 py-3 text-center">Date</th>
                        <th class="px-6 py-3 text-center">Total</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                @endif
            </thead>

            <tbody class="divide-y divide-gray-200">
                {{-- Pickup --}}
                @if ($isPickup)
                    @forelse($orders as $pickup)
                        <tr class="hover:bg-yellow-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $pickup->type }}</td>
                            <td class="px-6 py-4 text-center">{{ $pickup->weight }} kg</td>
                            <td class="px-6 py-4 text-center">{{ $pickup->pickup_date ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $pickup->address }}</td>
                            <td class="px-6 py-4 text-center">
                                @if ($pickup->status === 'diterima')
                                    <span
                                        class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">✅
                                        Accepted</span>
                                @elseif($pickup->status === 'ditolak')
                                    <span
                                        class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">❌
                                        Rejected</span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">⏳
                                        Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 italic text-gray-600">{{ $pickup->alasan_penolakan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-400 py-6">No pickup requests yet</td>
                        </tr>
                    @endforelse

                    {{-- Auction --}}
                @elseif($isAuction)
                    @forelse($orders as $auction)
                        <tr class="hover:bg-yellow-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $auction->id }}</td>
                            <td class="px-6 py-4 text-center">{{ $auction->updated_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-center">{{ Number::currency($auction->current_bid, 'IDR') }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('auction.detail', $auction->id) }}"
                                    class="bg-slate-600 hover:bg-slate-500 text-white text-xs px-4 py-2 rounded-md shadow">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-400 py-6">No auction orders yet</td>
                        </tr>
                    @endforelse

                    {{-- Product --}}
                @else
                    @forelse($orders as $order)
                        <tr class="hover:bg-yellow-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $order->id }}</td>
                            <td class="px-6 py-4 text-center">{{ $order->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-center">{{ Number::currency($order->grand_total, 'IDR') }}</td>
                            <td class="px-6 py-4 text-center">
                                <a wire:navigate href="history/{{ $order->id }}"
                                    class="bg-slate-600 hover:bg-slate-500 text-white text-xs px-4 py-2 rounded-md shadow">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-400 py-6">No product orders yet</td>
                        </tr>
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</div>
