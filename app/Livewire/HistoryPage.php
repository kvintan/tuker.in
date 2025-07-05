<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('History - Tuker.in')]
class HistoryPage extends Component
{
    public function render()
    {
        $history = Order::where('user_id', Auth::id())->latest()->paginate(5);
        
        return view('livewire.history-page', [
            'orders' => $history,
        ]);
    }
}
