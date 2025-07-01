<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Products - Tuker.in')]

class Product extends Component
{

    use WithPagination;
    
    public function render()
    {
        $productQuery = ProductModel::query()->where('in_stock', 1);
        return view('livewire.product', [
            'products' => $productQuery->paginate(6),
        ]);
    }
}
