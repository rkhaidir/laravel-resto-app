<?php

namespace App\Services\Category;

use LaravelEasyRepository\BaseService;

interface CategoryService extends BaseService
{
    public function getCategories();
    public function getCategoryPaginate();
    public function getCategoryById($id);
    public function createCategory($request);
    public function updateCategory($id, $request);
    public function deleteCategory($id);
}
