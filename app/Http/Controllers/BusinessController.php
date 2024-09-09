<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Authorize;
use App\Models\Category;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class BusinessController extends Controller
{
   public function business()
   {
       $customer = [];
       if (Session::has('loginId')) {
        
           $customer = Customer::where('id', '=', Session::get('loginId'))->first();

           $business = Business::where('customer', '=', $customer->id)->first();

           $authorizes = Authorize::all();
           $category = Category::all();
           $provinces = Province::all();

           return view('customer/form-user/business', compact('customer', 'authorizes', 'category', 'provinces', 'business'));
       } else {
           return back()->with('fail', 'Sorry, you do not have the right to access it. First, login to continue.');
       }
   }
   
   public function updatebusinessform(Request $request, $id)
   {
       $messages = [
           'required' => 'The :attribute field is required.',
           'latitude.between' => 'Latitude must be between -90 and 90 degrees.',
           'longitude.between' => 'Longitude must be between -180 and 180 degrees.',
           'latitude.regex' => 'Latitude must be a valid coordinate.',
           'longitude.regex' => 'Longitude must be a valid coordinate.',
       ];
   
       $request->validate([
           'summary' => 'required',
           'state' => 'required|exists:provinces,id',
           'district' => 'required|exists:districts,id',
           'municipality' => 'required|exists:municipalities,id',
           'ward' => 'required',
           'tole' => 'required',
           'latitude' => [
               'required',
               'numeric',
               'between:-90,90',
               'regex:/^[-+]?[0-9]{1,2}(\.[0-9]+)?$/'
           ],
           'longitude' => [
               'required',
               'numeric',
               'between:-180,180',
               'regex:/^[-+]?[0-9]{1,3}(\.[0-9]+)?$/'
           ],
       ]);

       $business = Business::updateOrCreate(
           ['customer' => $id],
           [
               'summary' => $request->summary,
               'address' => $request->address,
               'state' => $request->state,
               'district' => $request->district,
               'municipality' => $request->municipality,
               'ward' => $request->ward,
               'tole' => $request->tole,
               'latitude' => $request->latitude,
               'longitude' => $request->longitude,
           ]
       );
  
       if ($business) {
           return redirect()->route('businessserviceview', ['id' => $id])
               ->with('success', 'Business information has been updated successfully.');
       } else {
           return back()->with('fail', 'Sorry, there was an error updating the business information.');
       }
   }
   
    public function searchBusiness(Request $request)
    {
        $query = $request->input('query');
    
        $business = Business::whereHas('customershow', function($query) use ($request) {
            $query->where('business', 'like', '%' . $request->input('query') . '%');
        })->first();
    
        if ($business) {
            return response()->json([
                'latitude' => $business->latitude,
                'longitude' => $business->longitude,
                'address' => $business->address,
                'business_name' => $business->customershow->business
            ]);
        } else {
            return response()->json(['error' => 'Business not found'], 404);
        }
    }
    
}
