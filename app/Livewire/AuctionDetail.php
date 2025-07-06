<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class AuctionDetail extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = Product::with('bids.user')->findOrFail($product);
    }

    public function render()
    {
        return view('livewire.auction-detail', [
            'product' => $this->product
        ]);
    }
}
