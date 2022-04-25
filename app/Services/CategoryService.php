<?php

namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function listCategory()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($category, $request)
    {
        return $category->update($request);
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function delete($category){
        return $category->delete($category);
    }
}
