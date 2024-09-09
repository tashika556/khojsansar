<?php

namespace App\Http\Controllers;

use App\Models\BusinessService;
use App\Models\Service;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessServiceController extends Controller
{
    public function businessservice($id)
    {
    
        $services = Service::all();

 
        $business = Business::where('customer', $id)->firstOrFail();

  
        return view('customer.form-user.service', compact('services', 'business'));
    }


    public function updatebusinessserviceform(Request $request, $id)
    {

        $request->validate([
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);


        $business = Business::where('customer', $id)->firstOrFail();


        $business->services()->sync($request->input('services'));


        return redirect()->route('businessfacilityview', ['id' => $id])
            ->with('success', 'Services updated successfully!');
    }
}
