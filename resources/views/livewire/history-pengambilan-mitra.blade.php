<div class="p-8 min-h-screen bg-gradient-to-br">
    <div class="mb-8">
        <h2 class="text-4xl font-extrabold text-gray-800">Histori Pengambilan</h2>
        <p class="text-gray-500 mt-1 text-sm">Riwayat semua permintaan yang telah ditindaklanjuti</p>
    </div>

    <div class="overflow-x-auto bg-white shadow-xl rounded-xl">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-900 text-white text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">👤 Pengguna</th>
                    <th class="px-6 py-3 text-left">♻️ Jenis Sampah</th>
                    <th class="px-6 py-3 text-center">📦 Jumlah (KG)</th>
                    <th class="px-6 py-3 text-center">📌 Status</th>
                    <th class="px-6 py-3 text-left">📝 Alasan Penolakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($histories as $item)
                    <tr class="hover:bg-yellow-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $item->user->name }}</td>
                        <td class="px-6 py-4">{{ $item->type }}</td>
                        <td class="px-6 py-4 text-center">{{ $item->weight }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($item->status === 'ditolak')
                                <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V5a1 1 0 10-2 0v2a1 1 0 002 0zm-1 2a1 1 0 00-1 1v3a1 1 0 002 0v-3a1 1 0 00-1-1z"/></svg>
                                    Ditolak
                                </span>
                            @elseif($item->status === 'diterima')
                                <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"/></svg>
                                    Diterima
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 italic">
                            {{ $item->alasan_penolakan ?? '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-400 py-6">Belum ada data histori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
