<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create', 'store']);
        $this->middleware('permission:update_categories')->only(['edit', 'update']);
        $this->middleware('permission:delete_categories')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('admin.categories.index');

    }// end of index

    public function data()
    {
        $categories = Category::withCount(['articles']);

        return DataTables::of($categories)
            ->addColumn('record_select', 'admin.categories.data_table.record_select')
            ->addColumn('articles', 'admin.categories.data_table.articles')
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.categories.data_table.actions')
            ->rawColumns(['record_select', 'articles', 'actions'])
            ->toJson();


    }// end of data

    public function create()
    {
        return view('admin.categories.create');

    }// end of create

    public function store(CategoryRequest $request)
    {
        $requestData = $request->validated();

        if ($request->image) {
            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();
        }

        Category::create($requestData);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.categories.index');

    }// end of store

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));

    }// end of show

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));

    }// end of edit

    public function update(CategoryRequest $request, Category $category)
    {
        $requestData = $request->validated();

        if ($request->image) {
            Storage::disk('local')->delete('public/uploads/' . $category->image);
            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();
        }

        $category->update($requestData);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.categories.index');

    }// end of update

    public function destroy(Category $category)
    {
        $this->delete($category);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $category = Category::FindOrFail($recordId);
            $this->delete($category);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');

    }// end of bulkDelete

    private function delete(Category $category)
    {
        Storage::disk('local')->delete('public/uploads/' . $category->image);
        $category->delete();

    }// end of delete

}//end of controller
