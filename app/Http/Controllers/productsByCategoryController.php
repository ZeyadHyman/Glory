<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsByCategoryController extends Controller
{
    public function index($category, Request $request)
    {
        $categoryName = ucfirst(strtolower($category));

        $categoryModel = Category::where('name', $categoryName)->firstOrFail();

        $products = Product::where('category_id', $categoryModel->id)
            ->sortBy($request->input('sort'))
            ->get();

        return view('product.productsByCategory', [
            'products' => $products,
            'categoryName' => $categoryName,
        ]);
    }
}
