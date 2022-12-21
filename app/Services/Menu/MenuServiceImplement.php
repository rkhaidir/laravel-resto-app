<?php

namespace App\Services\Menu;

use LaravelEasyRepository\Service;
use App\Repositories\Menu\MenuRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MenuServiceImplement extends Service implements MenuService{

    /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
    protected $mainRepository;

  public function __construct(MenuRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getMenus()
  {
    try {
      return $this->mainRepository->getMenus();
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Get Menu Admin Paginate
   * 
   */
  public function getMenuAdminPaginate()
  {
    try {
      return $this->mainRepository->getMenuPaginate(4);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Get Menu By Id
   * 
   * @param $id
   */
  public function getMenuById($id)
  {
    try {
      return $this->mainRepository->getMenuById($id);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Create new Menu
   * 
   * @param $request
   */
  public function createMenu($request)
  {
    $image = $request->file('image')->store('public/menus');
    $data  = $request->validated();
    $data['image'] = $image;

    $menu = $this->mainRepository->createMenu($data);
    if($request->has('categories')) {
      $menu->categories()->attach($request->categories);
    }

    try {   
      return TRUE;
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Udpate Menu
   * 
   * @param $id
   * @param $request
   */
  public function updateMenu($id, $request)
  {
    $menu = $this->mainRepository->getMenuById($id);
    $validatedData = $request->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required'
    ]);
    if ($request->hasFile('image')) {
      Storage::delete($menu->image);
      $validatedData['image'] = $request->file('image')->store('public/menus');
    }
    $menu->update($validatedData);

    if($request->has('categories')) {
      $menu->categories()->sync($request->categories);
    }

    try {   
      return TRUE;
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Delete Menu
   * 
   * @param $id
   */
  public function deleteMenu($id)
  {
    $menu = $this->mainRepository->getMenuById($id);
    Storage::delete($menu->image);
    $menu->categories()->detach();

    try {   
      return $this->mainRepository->deleteMenu($id);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }
}
