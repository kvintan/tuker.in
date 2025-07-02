<?php

namespace App\Livewire;

use App\Models\Bids;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Auction extends Component
{
    public function testLog()
{
    logger()->info('===> testLog CALLED');
}
    
    public function placeBid($productId)
    {
        logger()->info('===> placeBid CALLED', ['product_id' => $productId]);
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
