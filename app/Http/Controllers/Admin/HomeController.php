<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Role;

class HomeController extends Controller
{
    public function index()
    {
        $rolesCount = Role::whereNotIn('name', ['super_admin', 'admin'])->count();
        $categoriesCount = Category::count();
        $articlesCount = Article::count();

        return view('admin.home', compact('rolesCount', 'categoriesCount', 'articlesCount'));

    }// end of index

}//end of controller
