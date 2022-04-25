<?php

namespace App\Services;

use App\Models\Post;
use App\Services\BaseService;

class PostService extends BaseService
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function listPost()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($post, $request)
    {
        return $post->update($request);
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function delete($post){
        return $post->delete($post);
    }
}
