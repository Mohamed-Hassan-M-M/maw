<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::whenCategoryId(request()->category_id)
            ->whenSearch(request()->search)
            ->where('status', 'published')
            ->paginate(2);

        $this->incrementCategoryViews(request());

        $categories = Category::where('id', '!=', request()->category_id)->limit(4)->get();

        return view('articles.index', compact('articles', 'categories'));

    }// end of index

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));

    }// end of show

    public function incrementCategoryViews($request)
    {
        if ($request->category_id) {
            $category = Category::FindOrFail($request->category_id);
            $category->increment('views_count');
        }

    }// end of incrementCategoryViews

}//end of controller
