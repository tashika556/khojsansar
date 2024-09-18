<?php

namespace App\Http\Controllers;

use App\Models\BusinessMenu;
use App\Models\Menu;
use App\Models\MenuPdf;
use App\Models\Business;
use Illuminate\Http\Request;


class BusinessMenuController extends Controller
{
    public function businessmenu($id)
    {
        $menuTopics = Menu::all();
        $business = Business::where('customer', $id)->firstOrFail();
        $existingPdf = MenuPdf::where('business', $business->id)->first();
        return view('customer.form-user.menu', compact('menuTopics', 'business', 'existingPdf'));
    }
    public function store(Request $request, $businessId)
    {
        $messages = [
            'required' => 'The :attribute field is required. Please click remove icon if you do not need it.',
            'photo.mimes' => 'Photos must be of the following file type: jpg, jpeg, or png.',
            'pdf.mimes' => 'File must be of the following file type: pdf.',
        ];
    
        // Adjust validation rules to handle dynamic inputs better
        $request->validate([
            'title.*.*' => 'sometimes|required|string|max:255',
            'price.*.*' => 'sometimes|required|string|max:255',
            'caption.*.*' => 'nullable|string',
            'photo.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ], $messages);
    
        $business = Business::findOrFail($businessId);
    
        foreach ($request->title as $topicId => $titles) {
            foreach ($titles as $index => $title) {
                $menuId = $request->menu_id[$topicId][$index] ?? null;
                $menuData = [
                    'menu_topic' => $topicId,
                    'business' => $businessId,
                    'title' => $title,
                    'price' => $request->price[$topicId][$index] ?? null,
                    'caption' => $request->caption[$topicId][$index] ?? null,
                ];
    
                if (isset($request->photo[$topicId][$index]) && $request->hasFile("photo.$topicId.$index")) {
                    $menuData['photo'] = $request->file("photo.$topicId.$index")->store('menu_photos', 'public');
                }
    
                if ($menuId) {
                    $menuItem = BusinessMenu::findOrFail($menuId);
                    $menuItem->update($menuData);
                } else {
                    BusinessMenu::create($menuData);
                }
            }
        }
        \Log::info('Request Data:', $request->all());
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('menu_pdfs', 'public');
            \Log::info('PDF uploaded to: ' . $pdfPath);
    
            $existingPdf = MenuPdf::where('business', $businessId)->first();
    
            if ($existingPdf) {
                $existingPdf->update(['pdf' => $pdfPath]);
            } else {
                MenuPdf::create(['pdf' => $pdfPath, 'business' => $businessId]);
            }
        }
        

        return redirect()->route('businessspecialview', $business->customer)->with('success', 'Menu items and PDF added/updated successfully!');
    }
    

}
