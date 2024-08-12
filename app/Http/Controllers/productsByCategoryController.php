<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productsByCategoryController extends Controller
{
    public function index($category)
    {
        if ($category == 'movies') {
            $products = Product::where("category", $category)->orWhere('category', 'series')->get();
            $categoryName = 'Movies & Series';
        } else {
            $products = Product::where("category", $category)->get();
            $categoryName = ucfirst(strtolower($category));
        }

        return view('product.productsByCategory', [
            'products' => $products,
            'categoryName' => $categoryName,
        ]);
    }
}
