<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowRequest;
use App\Models\Comment;
use App\Services\ShowService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }

    public function store(ShowRequest $request)
    {
        if ($this->showService->commentPost($request->all())) {
            return back()->with('success', 'comment thành công');
        }

        return back()->with('success', 'comment thất bại');
    }
}
