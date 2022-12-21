<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Services\Menu\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('menus.index', [
            'menus' => $this->menuService->getMenus()
        ]);
    }
}
