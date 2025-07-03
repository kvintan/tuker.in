<?php

namespace App\Livewire;

use App\Models\Product;
use App\Helpers\CartManagement;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductDetail extends Component
{
    use LivewireAlert;

    public $product;
    public $quantity = 1;

    // TERIMA PARAMETER DARI URL: {slug}
    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        for ($i = 0; $i < $this->quantity; $i++) {
            CartManagement::addItemToCart($this->product->id);
        }

        $this->dispatch('cart-updated');
    }


    public function render()
    {
        return view('livewire.product-detail');
    }
}
