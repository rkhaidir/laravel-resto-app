<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Category;

class CategoryRepositoryImplement extends Eloquent implements CategoryRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategories()
    {
        return $this->model->latest()->get();
    }

    public function getCategoryPaginate($paginate)
    {
        return $this->model->latest()->paginate($paginate);
    }

    public function createCategory(array $newCategory)
    {
        return $this->model->create($newCategory);
    }

    public function getCategoryById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateCategory($id, array $newCategory)
    {
        return $this->model->where('id', $id)->update($newCategory);
    }

    public function deleteCategory($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
