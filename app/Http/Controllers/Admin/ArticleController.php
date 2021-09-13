<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_articles')->only(['index']);
        $this->middleware('permission:create_articles')->only(['create', 'store']);
        $this->middleware('permission:update_articles')->only(['edit', 'update']);
        $this->middleware('permission:delete_articles')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('admin.articles.index');

    }// end of index

    public function data()
    {
        $articles = Article::whenStatus(request()->status)
            ->whenCategoryId(request()->category_id)
            ->select();

        return DataTables::of($articles)
            ->addColumn('record_select', 'admin.articles.data_table.record_select')
            ->addColumn('status', 'admin.articles.data_table.status')
            ->editColumn('created_at', function (Article $article) {
                return $article->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.articles.data_table.actions')
            ->rawColumns(['record_select', 'status', 'actions'])
            ->toJson();


    }// end of data

    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));

    }// end of create

    public function store(ArticleRequest $request)
    {
        $requestData = $request->validated();

        if ($request->file) {
            $request->file->store('public/uploads');
            $requestData['file'] = $request->file->hashName();
        }

        if ($request->image) {
            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();
        }

        Article::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.articles.index');

    }// end of store

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));

    }// end of show

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('admin.articles.edit', compact('categories', 'article'));

    }// end of edit

    public function update(ArticleRequest $request, Article $article)
    {
        $requestData = $request->validated();

        if ($request->file) {
            Storage::disk('local')->delete('public/uploads/' . $article->file);
            $request->file->store('public/uploads');
            $requestData['file'] = $request->file->hashName();
        }

        if ($request->image) {
            Storage::disk('local')->delete('public/uploads/' . $article->image);
            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();
        }

        $article->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.articles.index');

    }// end of update

    public function destroy(Article $article)
    {
        $this->delete($article);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.articles.index');

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $article = Article::FindOrFail($recordId);
            $this->delete($article);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.articles.index');

    }// end of bulkDelete

    private function delete(Article $article)
    {
        $article->delete();

    }// end of delete

}///end of controller
