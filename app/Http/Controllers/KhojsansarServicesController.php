<?php

namespace App\Http\Controllers;

use App\Models\KhojsansarServices;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Business;
use App\Models\Special;
use Illuminate\Support\Facades\File;

class KhojsansarServicesController extends Controller
{
    public function khojsansarservice()
    {
        $paymentMethods = PaymentMethod::all(); 

        $khojsansarservice = KhojsansarServices::all();
        return view('admin.khojsansarservices.khojsansarservice-list',compact('khojsansarservice','paymentMethods'));
    }
    public function createkhojsansarservice()
    { $paymentMethods = PaymentMethod::all(); 
        return view('admin.khojsansarserviceS.khojsansarservice-create',compact('paymentMethods'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
    
        ];
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'banner'=> 'required|image|mimes:jpg,jpeg,png',
            'icon'=> 'required|image|mimes:png',
        ], $messages);


        $khojsansarservice = new KhojsansarServices;
        $khojsansarservice->title = $request->title;
        $khojsansarservice->details = $request->details;


        if($request->hasfile('banner'))
        {
    $file =$request->file('banner');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/khojsansarservice/',$filename);
     $khojsansarservice-> banner = $filename;
        }
        if($request->hasfile('icon'))
        {
    $file =$request->file('icon');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/khojsansarservice/icon/',$filename);
     $khojsansarservice-> icon = $filename;
        }

        $res = $khojsansarservice->save();
        if ($res) {   return back()->with('success', 'Congratulations, Khojsansar Service is added ');
        } else {
            return back()->with('fail', 'Sorry, Khojsansar Service couldnot be added.');
        }
       
    }
    public function editkhojsansarservice($id)
    { $paymentMethods = PaymentMethod::all(); 
        $khojsansarservice = KhojsansarServices::findOrFail($id);
        return view('admin.khojsansarservices.khojsansarservice-edit', compact('khojsansarservice','paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'title.unique' => 'The khojsansarservice title is already taken.',
        ];
        
        $request->validate([
            'title' => 'required|unique:khojsansar_services,title,' . $id,
            'details' => 'required',
            'banner'=> 'sometimes|image|mimes:jpg,jpeg,png',
            'icon'=> 'sometimes|image|mimes:png',

        ], $messages);
        
        $khojsansarservice = KhojsansarServices::findOrFail($id);
        $khojsansarservice->title = $request->title;
        $khojsansarservice->details = $request->details;


        if ($request->hasFile('icon')) {
            $destination = 'uploads/khojsansarservice/icon/' . $khojsansarservice->icon;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/khojsansarservice/icon/', $filename);
    
            $khojsansarservice->icon = $filename;
        }

        if ($request->hasFile('banner')) {
            $destination = 'uploads/khojsansarservice/' . $khojsansarservice->banner;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/khojsansarservice/', $filename);
    
            $khojsansarservice->banner = $filename;
        }

        $res = $khojsansarservice->save();
        if ($res) {
            return back()->with('success', 'Khojsansar Service updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Khojsansar Service.');
        }
    }
    public function destroy($id)
{
    $khojsansarservice = KhojsansarServices::findOrFail($id);
    $res = $khojsansarservice->delete();
    
    if ($res) {
        return back()->with('success', 'Khojsansar Service deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Khojsansar Service.');
    }
}
//view page frontend
public function servicedetails($id)
{        $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $serviceDetail = KhojsansarServices::findOrFail($id);
    $khojsansarservice = KhojsansarServices::all(); 
    $businesses = Business::all(); 

    foreach ($businesses as $business) {
        $business->featuredSpecial = Special::where('business', $business->id)->first(); 
    }
    return view('frontend.service-details', compact('businesses','serviceDetail','partners','testimonials','sitesetting','contact','khojsansarservice'));
}

}

