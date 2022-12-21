<?php

namespace App\Repositories\Menu;

use LaravelEasyRepository\Repository;

interface MenuRepository extends Repository{

    public function getMenus();
    public function getMenuPaginate($paginate);
    public function getMenuById($id);
    public function createMenu(array $newMenu);
    public function updateMenu($id, array $newMenu);
    public function deleteMenu($id);
}
