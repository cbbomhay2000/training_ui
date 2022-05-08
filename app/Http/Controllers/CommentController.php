<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(ShowRequest $request)
    {
        if ($this->ShowService->commentPost($request->all())) {
            return back()->with('success', 'comment thành công');
        }

        return back()->with('success', 'comment thất bại');
    }
}
