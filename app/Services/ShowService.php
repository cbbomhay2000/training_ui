<?php

namespace App\Services;

use App\Models\Post;
use App\Services\BaseService;

class ShowService extends BaseService
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }
    public function showPost()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
    }
}