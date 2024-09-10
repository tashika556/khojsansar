<?php

namespace App\Http\Controllers;

use App\Models\BusinessMenu;
use App\Models\Menu;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessMenuController extends Controller
{
    public function businessmenu($id)
    {
        $menuTopics = Menu::all();
        $business = Business::where('customer', $id)->firstOrFail();
    
        return view('customer.form-user.menu', compact('menuTopics', 'business'));
    }
    
    public function store(Request $request, $businessId)
    {
        $request->validate([
            'title.*.*' => 'required|string|max:255',
            'price.*.*' => 'required|string|max:255',
            'caption.*.*' => 'nullable|string',
            'photo.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $business = Business::findOrFail($businessId);
    
        foreach ($request->title as $topicId => $titles) {
            foreach ($titles as $index => $title) {
                $menuData = [
                    'menu_topic' => $topicId,
                    'business' => $businessId,
                    'title' => $title,
                    'price' => $request->price[$topicId][$index],
                    'caption' => $request->caption[$topicId][$index] ?? null,
                ];
                if (isset($request->photo[$topicId][$index]) && $request->hasFile("photo.$topicId.$index")) {
                    $menuData['photo'] = $request->file("photo.$topicId.$index")->store('menu_photos', 'public');
                }
    
                BusinessMenu::create($menuData);
            }
        }

        return redirect()->route('businessspecialview', $business->customer)->with('success', 'Menu items added successfully!');
    }
    
    
    
}
