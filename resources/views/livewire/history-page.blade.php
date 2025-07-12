<div class="w-full max-w-[85rem] h-[70vh] lg:h-[90vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
        <select wire:model="filter"
            class="border-gray-300 text-sm rounded-lg shadow-sm focus:ring-slate-500 focus:border-slate-500">
            <option value="product">Product Orders</option>
            <option value="auction">Auction Orders</option>
            <option value="pickup">Pickup Requests</option>
        </select>
    </div>

    <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg"
        wire:key="orders-{{ $filter }}-{{ now() }}">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    @if ($isPickup)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-900 text-white text-xs uppercase">
                                <tr>
                                    <th class="px-6 py-3 text-left">♻️ Jenis Sampah</th>
                                    <th class="px-6 py-3 text-left">📦 Berat (KG)</th>
                                    <th class="px-6 py-3 text-left">📅 Tanggal Penjemputan</th>
                                    <th class="px-6 py-3 text-left">📍 Alamat</th>
                                    <th class="px-6 py-3 text-left">📌 Status</th>
                                    <th class="px-6 py-3 text-left">📝 Alasan Penolakan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($orders as $pickup)
                                    <tr class="odd:bg-white even:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $pickup->type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $pickup->weight }} kg
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $pickup->pickup_date ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $pickup->address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            @if ($pickup->status === 'ditolak')
                                                <span
                                                    class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                                    ❌ Ditolak
                                                </span>
                                            @elseif ($pickup->status === 'diterima')
                                                <span
                                                    class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                                    ✅ Diterima
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-1 bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">
                                                    ⏳ Pending
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 italic">
                                            {{ $pickup->alasan_penolakan ?? '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-gray-400 py-6">No History of Pickup
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-900 text-white text-xs uppercase">
                                <tr>
                                    <th class="px-6 py-3 text-left">🆔 Order</th>
                                    <th class="px-6 py-3 text-left">📅 Date</th>
                                    <th class="px-6 py-3 text-left">💰 Order Amount</th>
                                    <th class="px-6 py-3 text-end">🎯 Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Auction Orders --}}
                                @if ($isAuction)
                                    @forelse ($orders as $product)
                                        <tr class="odd:bg-white even:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ $product->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $product->updated_at->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ Number::currency($product->current_bid, 'IDR') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="{{ route('auction.detail', $product->id) }}"
                                                    class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-gray-400 py-6">
                                                No History of Auction
                                            </td>
                                        </tr>
                                    @endforelse
                                @else
                                    {{-- Product Orders --}}
                                    @forelse ($orders as $order)
                                        <tr wire:key='{{ $order->id }}' class="odd:bg-white even:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ $order->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $order->created_at->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ Number::currency($order->grand_total, 'IDR') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a wire:navigate href="history/{{ $order->id }}"
                                                    class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-gray-400 py-6">
                                                No History of Products
                                            </td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>

                        </table>

                    @endif
                </div>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
</div>
