<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pickup;

class PengambilanSampahMitra extends Component
{
    public $pengambilans;
    public $formPenolakan = false;
    public $selectedId, $alasanTolak, $konfirmasiTolak = false;

    public function mount()
    {
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
            'approved_by' => auth()->id(), // opsional, kalau kamu punya kolom approved_by
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
            'approved_by' => auth()->id(), // opsional
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
