<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProducDetails extends Controller
{
    public function index($productId)
    {
        $product = Product::where("id", $productId)->first();
        $productName = $product->name;
        return view('product-details', [
            'product' => $product,
            'productName' => $productName,
        ]);
    }
}
