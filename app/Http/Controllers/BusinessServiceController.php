<?php

namespace App\Http\Controllers;

use App\Models\BusinessService;
use App\Models\Service;
use App\Models\Business;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Customer;
use Session;

class BusinessServiceController extends Controller
{
    public function businessservice($id)
    {
        $services = Service::all();
        $business = Business::where('customer', $id)->firstOrFail();
        $sitesetting = SiteSetting::first();
        $contact = Contact::first();
    
        return view('customer.form-user.service', compact('services', 'business', 'sitesetting', 'contact'));
    }
    
    public function businessmenu($id)
    {    if (Session::has('loginId')) {
        $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        $menuTopics = Menu::all();
        $business = Business::where('customer', $id)->firstOrFail();
        $existingPdf = MenuPdf::where('business', $business->id)->first();
        $sitesetting = SiteSetting::first();
        $contact = Contact::first();
        return view('customer.form-user.menu', compact('customer','menuTopics', 'business', 'existingPdf','sitesetting','contact'));
    }else{
            return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
         }
    }
    public function updatebusinessserviceform(Request $request, $id)
    {

        $request->validate([
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);


        $business = Business::where('customer', $id)->firstOrFail();


        $business->services()->sync($request->input('services'));

        session(['businessServicesCompleted' => true]);
        return redirect()->route('businessfacilityview', ['id' => $id])
            ->with('success', 'Services updated successfully!');
    }
}
