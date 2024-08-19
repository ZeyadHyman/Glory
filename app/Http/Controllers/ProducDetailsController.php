<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProducDetailsController extends Controller
{
    public function index($productId)
    {
        $product = Product::where("id", $productId)->first();
        $productName = $product->name;
        
        if (is_string($product->images)) {
            $product->images = json_decode($product->images);
        }
        
        return view('product.productDetails', [
            'product' => $product,
            'productName' => $productName,
        ]);
        
    }
}
    