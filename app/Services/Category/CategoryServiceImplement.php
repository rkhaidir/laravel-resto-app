<?php

namespace App\Services\Category;

use LaravelEasyRepository\Service;
use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryServiceImplement extends Service implements CategoryService{

    /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
    protected $mainRepository;

  public function __construct(CategoryRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getCategories()
  {
    try {
      return $this->mainRepository->getCategories();
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  } 

  public function getCategoryPaginate()
  {
    try {
      return $this->mainRepository->getCategoryPaginate(4);
    } catch(Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  public function createCategory($request)
  {
    $image = $request->file('image')->store('public/categories');
    $data = $request->validated();
    $data['image'] = $image;

    try {
      return $this->mainRepository->createCategory($data);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  public function getCategoryById($id)
  {
    try {
      return $this->mainRepository->getCategoryById($id);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  public function updateCategory($id, $request)
  {
    $category = $this->mainRepository->getCategoryById($id);
      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required'
      ]);
      if ($request->hasFile('image')) {
        Storage::delete($category->image);
        $validatedData['image'] = $request->file('image')->store('public/categories');
      }

    try {
      return $this->mainRepository->updateCategory($id, $validatedData);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  public function deleteCategory($id)
  {
    $category = $this->mainRepository->getCategoryById($id);
    Storage::delete($category->image);
    $category->menus()->detach();

    try {
      return $this->mainRepository->deleteCategory($id);
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }
}
