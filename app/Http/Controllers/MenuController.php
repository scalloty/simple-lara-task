<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    // Show menu list
    public function index() {
        return view('menu.index',[
            'menus' => Menu::latest()->paginate(5)
        ]);
    }

    // Show add form
    public function create() {
        return view('menu.create',[
            'menu_list' => Menu::all()
        ]);
    }

    // Store menu data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'route' => 'required',
            'order' => 'numeric',
            'parent_id' => 'numeric'
        ]);
        
        Menu::create($formFields);

        return redirect('/admin/menu')->with('message', 'Menu created successully');
    }

     // Delete menu
     public function distroy(Menu $menu) {
        $menu->delete();
        return redirect('/admin/menu')->with('message', 'Menu deleted successully');
    }

    // Show edit form
    public function edit(Menu $menu) {
        return view('menu.edit',['menu'=>$menu,'menu_list' => Menu::all()]);
    }

    // Update menu data
    public function update(Request $request, Menu $menu) {
        $formFields = $request->validate([
            'title' => 'required',
            'route' => 'required',
            'order' => 'numeric',
            'parent_id' => 'numeric'
        ]);

        $menu->update($formFields);

        return back()->with('message', 'Menu updated successully');
    }
}
