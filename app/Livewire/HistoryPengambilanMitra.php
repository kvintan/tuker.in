<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pickup;
use Illuminate\Support\Facades\Auth;

class HistoryPengambilanMitra extends Component
{
    public $histories = [];

    public function mount()
    {
        $this->histories = Pickup::with('user')
            ->whereIn('status', ['diterima', 'ditolak'])
            ->orderByDesc('updated_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.history-pengambilan-mitra');
    }
}
