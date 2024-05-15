<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CatalogController extends Controller
{
    public function index(Category $category)
    {
        return view('catalog', [
            'category' => $category,
            'products' => $category->products,
        ]);
    }
}
