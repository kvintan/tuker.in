<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Livewire\Component;

class ProductDetail extends Component
{
    public $slug;
    public $product;
    public $quantity = 0;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = ProductModel::where('slug', $slug)->where('in_stock', 1)->firstOrFail();
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity <= 0) {
            $this->quantity = 0;
        } else {
            $this->quantity--;
        }
    }
    
    public function render()
    {
        return view('livewire.product-detail');
    }
}
