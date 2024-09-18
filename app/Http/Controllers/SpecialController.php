<?php

namespace App\Http\Controllers;

use App\Models\Special;
use App\Models\Business;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function businessspecial($id)
    {
        $business = Business::where('customer', $id)->firstOrFail();
        $specials = Special::where('business', $business->id)->get();
    
        return view('customer.form-user.special', compact('specials', 'business'));
    }
    
    public function store(Request $request, $businessId)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
    
        $request->validate([
            'special_name.*' => 'required|string|max:255',
            'short_detail.*' => 'required|string|max:255',
            'price.*' => 'required|string|max:255',
            'photo.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        $business = Business::findOrFail($businessId);
        $specialIds = $request->input('special_id', []); 
        $specialNames = $request->input('special_name', []);  
        $shortDetails = $request->input('short_detail', []);  
        $prices = $request->input('price', []);  
    
        foreach ($specialNames as $index => $specialName) {
            $specialData = [
                'business' => $businessId,
                'special_name' => $specialName,
                'short_detail' => $shortDetails[$index],
                'price' => $prices[$index],
            ];
    
            if (isset($request->photo[$index]) && $request->hasFile("photo.$index")) {
                $specialData['photo'] = $request->file("photo.$index")->store('special_photos', 'public');
            }
    
            if (isset($specialIds[$index]) && $specialIds[$index] != null) {
    
                $special = Special::findOrFail($specialIds[$index]);
                $special->update($specialData);
            } else {
      
                Special::create($specialData);
            }
        }
    
        return redirect()->route('businessphotosvideosview', $business->customer)->with('success', 'Special items added/updated successfully!');
    }
    
    

    
    
}
