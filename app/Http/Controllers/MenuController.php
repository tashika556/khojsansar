<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $menu =Menu::all();
        return view('admin.menu.menu-list',compact('menu'));
    }
    public function store(Request $request)
{
    Menu::create($request->only('menu_topic'));
    return redirect()->route('menu')->with('success', 'Menu created successfully!');
}

public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);
    $menu->update($request->only('menu_topic'));
    return redirect()->route('menu')->with('success', 'Menu updated successfully!');
}

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $res = $menu->delete();
        
        if ($res) {
            return back()->with('success', 'Menu deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete the Menu.');
        }
    }
}