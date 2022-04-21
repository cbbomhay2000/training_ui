<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'DESC')->get();
        return view('admincp.post.index')->with(compact('posts'));
    }
    
    public function create()
    {
        $category = Category::orderBy('created_at', 'DESC')->get();
        return view('admincp.post.create_post')->with(compact('category'));
    }

    public function store(Request $request)
    {
       
        $data = $request->all();
        $post = new Post();
        $post->name_post = $data['name_post'];
        $post->title_post = $data['title_post'];
        $post->desc = $data['desc'];
        $post->cate_id = $data['cate_id'];
        $post->save();
        return back()->with('success', 'Sửa thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Post::where('post_id',$id)->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
