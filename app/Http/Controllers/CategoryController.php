<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $this->viewData['categories'] = $this->categoryService->listCategory();

        return view('admin.category.index', $this->viewData);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        if ($this->categoryService->create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('failed', 'Thêm mới không thành công');
    }

    public function edit(Category $category)
    {
        $this->viewData['categories'] =  $category;
        
        return view('admin.category.edit');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        if ($this->categoryService->update($category, $request->all())) {
            return redirect()->back()->with('success', 'Sửa thành công');
        }

        return redirect()->back()->with('failed', 'Sửa thất bại');
    }

    public function destroy(Category $category)
    {
        if ($this->categoryService->delete($category)) {
            return back()->with('success', 'Xóa thành công');
        }

        return back()->with('failed', 'Xóa thất bại');
    }
}
