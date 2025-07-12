<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pickup;

class MitraDashboard extends Component
{
    public $filterKategori = '';
    public $kategoriList = [];

    public $totalDiterima = 0;
    public $totalDitolak = 0;
    public $totalKg = 0;
    public $latestPengambilan = [];
    public $totalPembelian = 0;

    public function mount()
    {
        // Ambil daftar kategori unik (opsional bisa dibatasi ke mitra_id saat ini)
        $this->kategoriList = Pickup::select('type')->distinct()->pluck('type')->toArray();
        $this->hitungStatistik();

        if (auth()->user()?->email !== 'mitra@gmail.com') {
        abort(403, 'Unauthorized');
    }
    }

    public function updatedFilterKategori()
    {
        $this->hitungStatistik(); // Refresh data saat dropdown berubah
    }

    public function hitungStatistik()
    {
        // Ambil semua data dari tabel pickups
        $baseQuery = Pickup::query();

        if (!empty($this->filterKategori)) {
            $baseQuery->where('type', $this->filterKategori);
        }

        $this->totalDiterima = (clone $baseQuery)->where('status', 'diterima')->count();
        $this->totalDitolak  = (clone $baseQuery)->where('status', 'ditolak')->count();
        $this->totalKg       = (clone $baseQuery)->where('status', 'diterima')->sum('weight');

        $this->latestPengambilan = (clone $baseQuery)->latest()->take(5)->get();

        $this->totalPembelian = (clone $baseQuery)
        ->where('status', 'diterima')
        ->get()
        ->sum(function ($item) {
            return $item->weight * $this->getHargaPerKg($item->type);
        });
    }

    public function getHargaPerKg($type)
    {
        return match (strtolower($type)) {
            'plastic', 'paper', 'elektronik' => 5000,
            'metal' => 3500,
            default => 0,
        };
    }



    public function render()
    {
        return view('livewire.mitra-dashboard');
    }
}
