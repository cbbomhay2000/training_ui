<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Services\BaseService;

class ShowService extends BaseService
{
    public function __construct(Post $model, Comment $comment)
    {
        $this->model = $model;
        $this->comment = $comment;
    }
    public function index($keyword)
    {
        return $this->model->where('name_post', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('author', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function commentPost($request)
    {
        $request['user_id'] = auth()->user()->id;

        return $this->comment->create($request);
    }
}
