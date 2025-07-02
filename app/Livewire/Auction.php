<?php

namespace App\Livewire;

use App\Models\Bids;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Auction extends Component
{   
    public function placeBid($productId)
    {
        $product = Product::findOrFail($productId);
    $user = User::find(Auth::id());

    $currentBid = $product->highestBid?->bid_amount ?? $product->starting_bid;
    $newBidAmount = $currentBid + 1000;

    // Cari bid sebelumnya dari user ini untuk produk ini
    $previousBid = Bids::where('product_id', $productId)
        ->where('user_id', $user->id)
        ->orderByDesc('bid_amount')
        ->first();

    // Saldo yang tersedia adalah saldo saat ini + bid sebelumnya (kalau ada)
    $availableBalance = $user->balance + ($previousBid->bid_amount ?? 0);

    if ($availableBalance < $newBidAmount) {
        session()->flash('error', 'Saldo tidak mencukupi untuk bid.');
        return;
    }

    // Kembalikan saldo dari bid sebelumnya (jika ada)
    if ($previousBid) {
        $user->balance += $previousBid->bid_amount;
        $previousBid->delete(); // Hapus bid lama agar tidak dobel
    }

    // Buat bid baru
    Bids::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'bid_amount' => $newBidAmount,
    ]);

    // Kurangi saldo
    $user->balance -= $newBidAmount;
    $user->save();

    $this->dispatch('$refresh');
    session()->flash('success', 'Bid berhasil!');
    }

    public function render()
    {
        $products = Product::with(['highestBid.user'])
            ->where('is_auction', true)
            ->whereNotNull('auction_end_time')
            ->get();

        return view('livewire.auction', compact('products'));
    }
}
