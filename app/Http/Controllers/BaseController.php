<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        // Dynamic Menu
        $menu = new Menu();
        $menuList = $menu->tree();
        View::share('menulist', $menuList);
    }
}
