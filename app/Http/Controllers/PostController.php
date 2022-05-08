<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
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

        return view('admin.post.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['categories'] = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.create', $this->viewData);
    }

    public function store(PostRequest $request)
    {
        if (  $this->postService->create($request->all())) {
            return back()->with('success', 'Thêm thành công');
        }
      
        return back()->with('success', 'Thêm thất bại');
    }

    public function edit(Post $post)
    {
        $this->viewData['categories'] = Category::orderBy('created_at', 'DESC')->get();
        $this->viewData['post'] = $post;

        return view('admin.post.edit', $this->viewData);
    }

    public function update(PostRequest $request, Post $post)
    {
        if ($this->postService->update($post, $request->all())) {
            return redirect()->back()->with('success', 'Sửa thành công');
        }

        return redirect()->back()->with('failed', 'Sửa thất bại');
    }

    public function destroy(Post $post)
    {
        if($this->postService->delete($post)){
            return back()->with('success', 'Xóa thành công');
        }
        
        return back()->with('failed', 'Xóa thất bại');
    }
}
