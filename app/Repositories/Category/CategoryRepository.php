<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Repository;

interface CategoryRepository extends Repository
{
    public function getCategories();
    public function getCategoryPaginate($paginate);
    public function getCategoryById($id);
    public function createCategory(array $newCategory);
    public function updateCategory($id, array $newCategory);
    public function deleteCategory($id);
}
