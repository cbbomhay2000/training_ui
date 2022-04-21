<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('cate_id', 'DESC')->get();
        return view('admincp.category.index')->with(compact('categories'));
    }

    public function create()
    {
      return view('admincp.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->cate_name = $data['cateName'];
        $category->save();
        return redirect()->back()->with('success', 'Thêm thành công');
    
    }

    public function show(Request $request,$id)
    { 
       
    }

    public function edit(Category $category)
    {
        dd($category);
        // $category = Category::find($id);
        return view('admincp.category.show')->with(compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find('cate_id',$id);
        $category->cate_name = $data['cateName'];
        $category->save();
        return redirect()->back()->with('success', 'Sửa thành công');
    
    }

    public function destroy(Request $request, $id)
    { 
        Category::where('cate_id',$id)->delete();
        return back()->with('success', 'Xóa thành công');
    }
} 
