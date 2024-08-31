<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = ModelsCategory::get();
        return view('category')->with('categories', $categories);
    }
}
