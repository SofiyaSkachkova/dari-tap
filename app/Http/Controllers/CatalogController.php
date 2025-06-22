<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CatalogController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $medicines = $category->medicines; 

        return view('categories.show', compact('category', 'medicines'));
    }
}
