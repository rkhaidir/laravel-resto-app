<?php

namespace App\Repositories\Menu;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Menu;

class MenuRepositoryImplement extends Eloquent implements MenuRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getMenus()
    {
        return $this->model->select('name', 'description', 'image', 'price')->latest()->get();
    }

    /**
     * Get Menu Paginate
     * 
     * @param $paginate
     */
    public function getMenuPaginate($paginate)
    {
        return $this->model->select('id', 'name', 'image', 'price')->latest()->paginate($paginate);
    }

    /**
     * Get Menu By Id
     * 
     * @param $id
     */
    public function getMenuById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create new menu
     * 
     * @param array $newMenu
     */
    public function createMenu(array $newMenu)
    {
        return $this->model->create($newMenu);
    }


    /**
     * Update Menu
     * 
     * @param $id
     * @param array $newMenu
     */
    public function updateMenu($id, array $newMenu)
    {
        return $this->model->where('id', $id)->update($newMenu);
    }

    /**
     * Delete menu
     * 
     * @param $id
     */
    public function deleteMenu($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
