<?php

namespace App\Livewire;

use App\Models\Pickup;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PengambilanSampahMitra extends Component
{
    public $pengambilans;
    public $formPenolakan = false;
    public $selectedId, $alasanTolak, $konfirmasiTolak = false;
    

    public function mount()
    {
        $user = Auth::user();
        if ($user?->email !== 'mitra@gmail.com') {
            abort(403, 'Unauthorized');
        }

        $this->loadData();
    }

    public function loadData()
{
    $this->pengambilans = Pickup::where('status', 'pending')->get();
}

    public function terima($id)
    {
        $item = Pickup::find($id);

        if (!$item) {
            session()->flash('error', 'Data tidak ditemukan.');
            return;
        }

        $item->update([
            'status' => "diterima",
        ]);

        // Tambah saldo user berdasarkan jenis sampah
        $hargaPerKg = match (strtolower($item->type)) {
            'plastic' => 5000,
            'paper' => 5000,
            'metal' => 3500,
            'elektronik' => 5000,
        };

        $totalBayar = $item->weight * $hargaPerKg;
        $item->user->increment('balance', $totalBayar);

        session()->flash('success', 'Permintaan diterima. Saldo user bertambah Rp ' . number_format($totalBayar, 0, ',', '.'));
        $this->loadData();
    }

    public function tolak($id)
    {
        $this->selectedId = $id;
        $this->konfirmasiTolak = true;
    }

    public function submitPenolakan()
    {
        $this->validate([
            'alasanTolak' => 'required|min:5',
        ]);

        $item = Pickup::find($this->selectedId);

        if (!$item) {
            session()->flash('error', 'Data tidak ditemukan.');
            return;
        }

        $item->update([
            'status' => "ditolak",
            'alasan_penolakan' => $this->alasanTolak,
        ]);

        $this->reset(['alasanTolak', 'selectedId', 'formPenolakan', 'konfirmasiTolak']);
        session()->flash('success', 'Permintaan berhasil ditolak.');
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.pengambilan-sampah-mitra');
    }
}
