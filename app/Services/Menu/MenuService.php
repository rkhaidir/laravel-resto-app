<?php

namespace App\Services\Menu;

use LaravelEasyRepository\BaseService;

interface MenuService extends BaseService{

    public function getMenus();
    public function getMenuAdminPaginate();
    public function getMenuById($id);
    public function createMenu($request);
    public function updateMenu($id, $request);
    public function deleteMenu($id);
}
