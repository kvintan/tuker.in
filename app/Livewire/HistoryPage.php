<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('History - Tuker.in')]
class HistoryPage extends Component
{
    use WithPagination;

    #[Url()]
    public $filter = 'product'; // default langsung ke product orders

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::id();

        if ($this->filter === 'auction') {
            $orders = Product::where('is_auction', true)
                ->where('auction_end_time', '<=', now())
                ->whereHas('bids', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->latest()
                ->paginate(5);
        } else {
            $orders = Order::where('user_id', $userId)
                ->latest()
                ->paginate(5);
        }

        return view('livewire.history-page', [
            'orders' => $orders,
            'isAuction' => $this->filter === 'auction',
        ]);
    }
}