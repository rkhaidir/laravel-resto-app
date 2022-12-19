<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{

  private $categoryService;

  public function __construct(CategoryService $categoryService)
  {
    $this->categoryService = $categoryService;
  }

  public function index()
  {
    return view('categories.index', [
      'categories' => $this->categoryService->getCategories()
    ]);
  }

  public function show($id)
  {
    return view('categories.show', [
      'category' => $this->categoryService->getCategoryById($id)
    ]);
  }
}
