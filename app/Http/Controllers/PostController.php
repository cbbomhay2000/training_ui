<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;
class PostController extends Controller
{
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    { 
        $this->viewData['posts'] = $this->postService->listPost();
        return view('admincp.post.index', $this->viewData);
    }
    
    public function create()
    {
        $category = Category::orderBy('created_at', 'DESC')->get();
        return view('admincp.post.create')->with(compact('category'));
    }

    public function store(PostRequest $request)
    {
        $this->postService->create($request->all());
        return back()->with('success', 'Thêm thành công');
    }

    public function edit(Post $post, Category $category)
    {
        $category = Category::orderBy('created_at', 'DESC')->get();
        return view('admincp.post.edit',compact('post'), compact('category') );
    }

    public function update(PostRequest $request, Post $post)
    {
     $this->postService->update($post, $request->all());
            return redirect()->back()->with('success', 'Sửa thành công');
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post);
        return back()->with('success', 'Xóa thành công');
    }
}
