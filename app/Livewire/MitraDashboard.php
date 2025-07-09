<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PengambilanSampah;

class MitraDashboard extends Component
{
    public $filterKategori = '';
    public $kategoriList = [];

    public $totalDiterima = 0;
    public $totalDitolak = 0;
    public $totalKg = 0;
    public $latestPengambilan = [];

    public function mount()
    {
        // Ambil daftar kategori unik (opsional bisa dibatasi ke mitra_id saat ini)
        $this->kategoriList = PengambilanSampah::select('jenis')->distinct()->pluck('jenis')->toArray();
        $this->hitungStatistik();
    }

    public function updatedFilterKategori()
    {
        $this->hitungStatistik(); // Refresh data saat dropdown berubah
    }

    public function hitungStatistik()
    {
        $baseQuery = PengambilanSampah::where('mitra_id', auth()->id());

        if (!empty($this->filterKategori)) {
            $baseQuery->where('jenis', $this->filterKategori);
        }

        // clone bisa diganti dengan build ulang query untuk menghindari error
        $this->totalDiterima = (clone $baseQuery)->where('status', 'diterima')->count();
        $this->totalDitolak  = (clone $baseQuery)->where('status', 'ditolak')->count();
        $this->totalKg       = (clone $baseQuery)->where('status', 'diterima')->sum('jumlah');

        $this->latestPengambilan = (clone $baseQuery)->latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.mitra-dashboard');
    }
}
