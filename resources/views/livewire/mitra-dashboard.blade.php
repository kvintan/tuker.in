<div class="min-h-screen bg-gradient-to-br text-gray-800 p-8">
    <h1 class="text-4xl font-extrabold mb-8">Partner Dashboard</h1>

    {{-- Dropdown Filter --}}
    <div class="mb-6 w-full md:w-1/3">
        <label class="block mb-1 text-sm font-medium text-gray-600">Filter by Waste Type</label>
        <select wire:model="filterKategori" class="...">
            <option value="">All</option>
            @foreach ($kategoriList as $kategori)
                <option value="{{ $kategori }}">{{ ucfirst($kategori) }}</option>
            @endforeach
        </select>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow text-center">
            <h2 class="text-sm text-gray-500">Total Accepted</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalDiterima }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow text-center">
            <h2 class="text-sm text-gray-500">Total Rejected</h2>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $totalDitolak }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow text-center">
            <h2 class="text-sm text-gray-500">Total Accepted Waste (kg)</h2>
            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ number_format($totalKg, 1) }}</p>
        </div>
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow text-center">
            <h2 class="text-sm text-gray-500">Total Waste Purchase</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                Rp {{ number_format($totalPembelian, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700">Recent Pickups</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Type</th>
                        <th class="px-6 py-3 text-center">Weight (kg)</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-center">💵 Price per Kg</th>
                        <th class="px-6 py-3 text-center">💰 Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($latestPengambilan as $item)
                        <tr class="hover:bg-yellow-50 transition">
                            <td class="px-6 py-3 font-medium">{{ $item->user->name }}</td>
                            <td class="px-6 py-3 capitalize">{{ $item->type }}</td>
                            <td class="px-6 py-3 text-center">{{ $item->weight }}</td>
                            <td class="px-6 py-3 text-center">
                                @if ($item->status === 'diterima')
                                    <span
                                        class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Accepted
                                    </span>
                                @elseif($item->status === 'ditolak')
                                    <span
                                        class="inline-block bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Rejected
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center">
                                Rp {{ number_format($this->getHargaPerKg($item->type), 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-3 text-center">
                                Rp {{ number_format($this->getHargaPerKg($item->type) * $item->weight, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-400 italic">No history available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
