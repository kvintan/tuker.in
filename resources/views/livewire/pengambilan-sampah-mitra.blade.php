<div class="p-8 min-h-screen bg-gradient-to-br">
    <div class="mb-8">
        <h2 class="text-4xl font-extrabold text-gray-800">Pengambilan Sampah</h2>
        <p class="text-gray-500 text-sm">Daftar permintaan dari pengguna yang perlu ditindaklanjuti</p>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-xl">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-900 text-white text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Pengguna</th>
                    <th class="px-6 py-3 text-left">Jenis Sampah</th>
                    <th class="px-6 py-3 text-center">Jumlah (KG)</th>
                    <th class="px-6 py-3 text-center">Tanggal Pickup</th>
                    <th class="px-6 py-3 text-left">Alamat</th>
                    <th class="px-6 py-3 text-left">Telepon</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($pengambilans as $sampah)
                <tr class="hover:bg-yellow-50 transition">
                    <td class="px-6 py-4 font-medium">{{ $sampah->user->name }}</td>
                    <td class="px-6 py-4">{{ $sampah->type }}</td>
                    <td class="px-6 py-4 text-center">{{ $sampah->weight }}</td>
                    <td class="px-6 py-4 text-center">{{ $sampah->pickup_date }}</td>
                    <td class="px-6 py-4">{{ $sampah->address }}</td>
                    <td class="px-6 py-4">{{ $sampah->phone_number }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($sampah->status === 'pending')
                        <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Pending
                        </span>
                        @elseif($sampah->status === 'diterima')
                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Diterima
                        </span>
                        @elseif($sampah->status === 'ditolak')
                        <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Ditolak
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-center">
                        @if($sampah->status === 'pending')
                        <div class="flex items-center justify-center gap-2">
                            <button wire:click="terima({{ $sampah->id }})"
                                class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-4 py-1 rounded-full shadow transition">
                                Terima
                            </button>
                            <button wire:click="tolak({{ $sampah->id }})"
                                class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-4 py-1 rounded-full shadow transition">
                                Tolak
                            </button>
                        </div>
                        @else
                        <span class="text-gray-400 italic text-xs">Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-gray-400 py-6">Belum ada permintaan baru</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Form Alasan Penolakan --}}
    @if($konfirmasiTolak)
    <div class="mt-6 p-6 bg-yellow-50 border border-yellow-300 rounded-xl shadow-md">
        <h3 class="text-md font-semibold text-gray-800 mb-2">Alasan Penolakan</h3>
        <textarea wire:model.defer="alasanTolak"
            class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Contoh: Sampah tidak sesuai kategori..." rows="3"></textarea>

        <div class="mt-4 flex gap-3">
            <button type="button" wire:click="submitPenolakan"
                class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-1 rounded shadow">
                Kirim
            </button>

            <button type="button" wire:click="$set('konfirmasiTolak', false)"
                class="bg-gray-400 hover:bg-gray-500 text-white text-sm px-4 py-1 rounded">
                Batal
            </button>
        </div>
    </div>
    @endif
</div>