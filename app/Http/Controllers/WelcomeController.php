<?php

namespace App\Http\Controllers;

use App\Models\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::limit(6)->get();
        return view('welcome', compact('categories'));

    }// end of index

}//end of controller
