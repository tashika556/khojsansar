<?php

namespace App\Http\Controllers;

use App\Models\BusinessFacility;
use App\Models\Facility;
use App\Models\Business;
use App\Models\Customer;
use Session;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;


class BusinessFacilityController extends Controller
{
    public function businessfacility()
    {
        if (Session::has('loginId')) {
            $customer = Customer::where('id', '=', Session::get('loginId'))->first();
            
        
            $business = Business::where('customer', $customer->id)->firstOrFail();
    
            session(['business_id' => $business->id]);
    
            $facilities = Facility::all();
            $sitesetting = SiteSetting::first();
            $contact = Contact::first();
    
            return view('customer.form-user.facility', compact('customer', 'facilities', 'business', 'sitesetting', 'contact'));
        } else {
            return back()->with('fail', 'Sorry, you do not have the right to access it. First, login to continue');
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'facilities' => 'required|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $businessId = session('business_id');
    
        if (!$businessId) {
            return redirect()->route('businessfacilityview')->with('fail', 'Unable to identify business. Please try again.');
        }
    
        $business = Business::findOrFail($businessId);
        $business->facilities()->sync($request->input('facilities'));
        session(['businessFacilityCompleted' => true]);
    
        return redirect()->route('businessmenuview', $business->customer)->with('success', 'Facilities updated successfully!');
    }
    
    
}
