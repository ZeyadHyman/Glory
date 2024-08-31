<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsByCategoryController extends Controller
{
    public function index($category, Request $request)
    {
        $categoryModel = Category::where('name', ucfirst(strtolower($category)))->firstOrFail();
        $categoryId = $categoryModel->id;

        $query = Product::where('category_id', $categoryId);

        $categoryName = ucfirst(strtolower($category));

        $sort = $request->input('sort');
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->get();

        return view('product.productsByCategory', [
            'products' => $products,
            'categoryName' => $categoryName,
        ]);
    }
}
