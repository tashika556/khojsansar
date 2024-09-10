<?php

namespace App\Http\Controllers;

use App\Models\Special;
use App\Models\Business;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function businessspecial($id)
    {
        $special = Special::all();
        $business = Business::where('customer', $id)->firstOrFail();
    
        return view('customer.form-user.special', compact('special', 'business'));
    }
    public function store(Request $request, $businessId)
    {
        $request->validate([
            'special_name.*' => 'required|string|max:255',
            'photo.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $business = Business::findOrFail($businessId);
        $specialNames = $request->input('special_name', []);
        
        foreach ($specialNames as $index => $specialName) {
            $specialData = [
                'business' => $businessId,
                'special_name' => $specialName,
            ];
    
            if (isset($request->photo[$index]) && $request->hasFile("photo.$index")) {
                $specialData['photo'] = $request->file("photo.$index")->store('special_photos', 'public');
            }
    
            Special::create($specialData);
        }
        return redirect()->route('businessphotosvideosview', $business->customer)->with('success', 'Special  items added successfully!');
  
    }
    
}
