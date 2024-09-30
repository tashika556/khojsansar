<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\PaymentMethod;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\KhojsansarServices;
use App\Models\Business;
use App\Models\Special;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Customer;
use Session;

class AboutController extends Controller
{
    public function about()
    {
        $paymentMethods = PaymentMethod::all(); 

        $about = About::first(); 
        return view('admin.abouts.about-list',compact('about','paymentMethods'));
    }
    
    public function editabout($id)
    { $paymentMethods = PaymentMethod::all(); 
        $about = About::findOrFail($id);
        return view('admin.abouts.about-edit', compact('about','paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
    
        ];
        
        $request->validate([
            'details' => 'required',
            'cover_image'=> 'required|image|mimes:jpg,jpeg,png',
            'mission_image_one'=> 'required|image|mimes:jpg,jpeg,png',
            'mission_image_two'=> 'required|image|mimes:jpg,jpeg,png',
            'vision_image_one'=> 'required|image|mimes:jpg,jpeg,png',
            'vision_image_two'=> 'required|image|mimes:jpg,jpeg,png',
            'mission_details' => 'required',
            'vision_details' => 'required',

        ], $messages);
        
        $about = About::findOrFail($id);
        $about->mission_details= $request->mission_details;
        $about->vision_details= $request->vision_details;
        $about->details = $request->details;



        if ($request->hasFile('cover_image')) {
            $destination = 'uploads/about/coverimage/' . $about->cover_image;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/coverimage/', $filename);
    
            $about->cover_image = $filename;
        }

        if ($request->hasFile('mission_image_one')) {
            $destination = 'uploads/about/mission_image/one/' . $about->mission_image_one;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('mission_image_one');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/mission_image/one/', $filename);
    
            $about->mission_image_one = $filename;
        }

        if ($request->hasFile('mission_image_two')) {
            $destination = 'uploads/about/mission_image/two/' . $about->mission_image_two;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('mission_image_two');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/mission_image/two/', $filename);
    
            $about->mission_image_two = $filename;
        }

        if ($request->hasFile('vision_image_one')) {
            $destination = 'uploads/about/vision_image/one/' . $about->vision_image_one;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('vision_image_one');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/vision_image/one/', $filename);
    
            $about->vision_image_one = $filename;
        }

        if ($request->hasFile('vision_image_two')) {
            $destination = 'uploads/about/vision_image/two/' . $about->vision_image_two;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('vision_image_two');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/vision_image/two/', $filename);
    
            $about->vision_image_two = $filename;
        }

        $res = $about->save();
        if ($res) {
            return back()->with('success', 'Abouts updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Abouts.');
        }
    }
    public function aboutview()
{      $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $khojsansarservice = KhojsansarServices::all(); 
    $paymentMethods = PaymentMethod::all(); 
    $about = About::first();
    $businesses = Business::all(); 

    foreach ($businesses as $business) {
        $business->featuredSpecial = Special::where('business', $business->id)->first(); 
    }
    
    return view('frontend/about',compact('businesses','about','testimonials','sitesetting','contact','partners','khojsansarservice'));
}
public function aboutcustomer()
{  

    if (Session::has('loginId')) {
        $customer = Customer::where('id', '=', Session::get('loginId'))->first();
    $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $khojsansarservice = KhojsansarServices::all(); 
    $paymentMethods = PaymentMethod::all(); 
    $about = About::first();
    $businesses = Business::all(); 

    foreach ($businesses as $business) {
        $business->featuredSpecial = Special::where('business', $business->id)->first(); 
    }
    
    return view('customer/about',compact('customer','businesses','about','testimonials','sitesetting','contact','partners','khojsansarservice'));
}else{
    return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
 }
}  
}
