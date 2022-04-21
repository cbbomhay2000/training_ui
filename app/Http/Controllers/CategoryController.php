<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $this->viewData['categories'] = $this->categoryService->listCategory();

        return view('admincp.category.index', $this->viewData);
    }

    public function create()
    {
        return view('admincp.category.create');
    }

    public function store(Request $request)
    {
        if ($this->categoryService->create($request->all())) {
            return redirect()->back()->with('success', 'Them moi thành công');
        }

        return redirect()->back()->with('failed', 'Them moi k thành công');
    }

    public function edit(Category $category)
    {
        return view('admincp.category.show', compact('category'));
    }

    public function update(Request $request, Category $category) // form request va model binding
    {
        if ($this->categoryService->update($category, $request->all())) {
            return redirect()->back()->with('success', 'Sửa thành công');
        }

        return redirect()->back()->with('failed', 'Sửa thất bại');
    }

    public function destroy(Request $request)
    {
        // Category::where('cate_id',$id)->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
