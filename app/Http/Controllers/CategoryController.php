<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);
        return view('categories.index', compact('categories'));

    }// end of index

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));

    }// end of show

}//end of controller
