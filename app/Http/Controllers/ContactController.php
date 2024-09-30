<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\Customer;
use Session;

class ContactController extends Controller
{
    public function contact()
    {
        $paymentMethods = PaymentMethod::all(); 

        $contact = Contact::first(); 
        return view('admin.contact.contact-list',compact('contact','paymentMethods'));
    }
 
    public function editcontact($id)
    {
        $paymentMethods = PaymentMethod::all();
        $contact = Contact::findOrFail($id);

    
        return view('admin.contact.contact-edit', compact('contact', 'paymentMethods'));
    }
    
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'banner.required' => 'banner is required.',
            'banner.image' => 'banner must be an image.',
        ];
    
        $request->validate([
            'address_one' => 'required',
            'email_one' => 'required',
            'phone_one' => 'required',
            'banner' => 'sometimes|image|mimes:jpeg,png,jpg|max:4096',
            'opening_hours' => 'required',
            'map_url' => 'required',
        ], $messages);
    
        $contact = Contact::find($id);
    
        $contact->address_one = $request->address_one;
        $contact->address_two = $request->address_two;
        $contact->email_one = $request->email_one;
        $contact->email_two = $request->email_two;
        $contact->phone_one = $request->phone_one;
        $contact->phone_two = $request->phone_two;
        $contact->facebook_url = $request->facebook_url;
        $contact->twitter_url = $request->twitter_url;
        $contact->instagram_url = $request->instagram_url;
        $contact->youtube_url = $request->youtube_url;
        $contact->map_url = $request->map_url;
        $contact->opening_hours = $request->opening_hours;
  
    
  
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $banner->move(public_path('banners/contact'), $bannerName);
    
            if ($contact->banner && file_exists(public_path('banners/contact/' . $contact->banner))) {
                unlink(public_path('banners/contact/' . $contact->banner));
            }
    
            $contact->banner = $bannerName;
        }
   
        $contact->save();
    
        return back()->with('success', 'Contact updated successfully');
    }
        
    public function contactcustomer()
    {     if (Session::has('loginId')) {
        $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        $sitesetting= SiteSetting::first();
        $contact = Contact::first();
        return view('customer/contact', compact('customer','sitesetting','contact'));
    }else{
        return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
     }
 
    }
}
