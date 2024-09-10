<?php

namespace App\Http\Controllers;

use App\Models\BusinessFacility;
use App\Models\Facility;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessFacilityController extends Controller
{
   
    public function businessfacility($id)
    {
        $facilities = Facility::all();
        $business = Business::where('customer', $id)->firstOrFail();

        return view('customer.form-user.facility', compact('facilities', 'business'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'facilities' => 'required|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $business = Business::where('customer', $id)->firstOrFail();
        $business->facilities()->sync($request->input('facilities'));

        return redirect()->route('businessmenuview', ['id' => $id])
            ->with('success', 'Facilities updated successfully!');
    }

    
}
