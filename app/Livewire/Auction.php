<?php

namespace App\Livewire;

use App\Models\Bids;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Auction extends Component
{
    public $products;

public function mount()
    {
        $this->products = Product::where('is_auction', true)->whereNotNull('auction_end_time')->get();
    }

    public function placeBid($productId)
    {
        $product = Product::findOrFail($productId);
        $user = User::find(Auth::id());

        $currentBid = $product->highestBid()?->bid_amount ?? $product->starting_bid;
        $newBidAmount = $currentBid + 1000;

        if ($user->balance < $newBidAmount) {
            session()->flash('error', 'Saldo tidak mencukupi untuk bid.');
            return;
        }

        Bids::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'bid_amount' => $newBidAmount,
        ]);

        $user->balance -= $newBidAmount;
        $user->save();

        // Tidak perlu update $this->products lagi karena akan diambil dari render()
    }

    public function render()
    {
        $products = Product::with('highestBid')
            ->where('is_auction', true)
            ->whereNotNull('auction_end_time')
            ->get();
            
        return view('livewire.auction', compact('products'));
    }
}
