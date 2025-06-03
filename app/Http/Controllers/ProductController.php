<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Import model Product

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua data produk dari database
        $products = Product::where('is_auction', false)->get();

        // Kirim data products ke view "products.index"
        return view('product', compact('products'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('detail', compact('product'));

    }
}
