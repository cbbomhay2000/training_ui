<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ShowService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }

    public function index(Request $request)
    {
        $this->viewData['posts'] = $this->showService->index($request->search);

        return view('user.list', $this->viewData);
    }
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($show)
    {
        // $posts = Post::where('id', '=', $show)->select('*')->first();
        $posts = Post::find($show);
        
        return view('user.show')->with(compact('posts'));
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
        //
    }
}
