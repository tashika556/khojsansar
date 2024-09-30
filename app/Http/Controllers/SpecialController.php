<?php

namespace App\Http\Controllers;

use App\Models\Special;
use App\Models\Business;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Customer;
use Session;


class SpecialController extends Controller
{ 
    public function businessspecial($id)
    { if (Session::has('loginId')) {
        $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        $business = Business::where('customer', $id)->firstOrFail();
        $specials = Special::where('business', $business->id)->get();
        $sitesetting = SiteSetting::first();
        $contact = Contact::first();
        return view('customer.form-user.special', compact('customer','specials', 'business','sitesetting','contact'));
    }else{
        return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
     }
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
        session(['businessSpecialCompleted' => true]);
        return redirect()->route('businessphotosvideosview', $business->customer)->with('success', 'Special items added/updated successfully!');
    }
    
    

    
    
}
