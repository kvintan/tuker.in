<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\CartManagement;

class Cart extends Component
{
    public $cartItems = [];
    public $grandTotal = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function increment($productId)
    {
        CartManagement::incremenetQuantityToCartItem($productId);
        $this->loadCart();
    }

    public function decrement($productId)
    {
        CartManagement::decrementQuantityToCartItem($productId);
        $this->loadCart();
    }

    public function remove($productId)
    {
        CartManagement::removeCartItem($productId);
        $this->loadCart();

        $this->dispatch('cart-item-deleted');
    }

    private function loadCart()
    {
        $this->cartItems = CartManagement::getCartItemsFromCookie();
        $this->grandTotal = CartManagement::calculateGrandTotal($this->cartItems);
    }

    
}
