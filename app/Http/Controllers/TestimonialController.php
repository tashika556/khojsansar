<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\PaymentMethod;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\KhojsansarServices;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function testimonial()
    {
        $paymentMethods = PaymentMethod::all(); 

        $testimonial =Testimonial::all();
        return view('admin.testimonials.testimonial-list',compact('testimonial','paymentMethods'));
    }
    public function createtestimonial()
    { $paymentMethods = PaymentMethod::all(); 
        return view('admin.testimonialS.testimonial-create',compact('paymentMethods'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
     
        ]; 
       
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'message'=> 'required',
        ], $messages);
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->address = $request->address;
        $testimonial->message = $request->message;

        $res = $testimonial->save();
        if ($res) {   return back()->with('success', 'Congratulations, Testimonial is added ');
        } else {
            return back()->with('fail', 'Sorry, Testimonial couldnot be added.');
        }
       
    }
    public function edittestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $paymentMethods = PaymentMethod::all(); 
        return view('admin.testimonials.testimonial-edit',compact('testimonial','paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        
        $request->validate([
            'name' => 'required' . $id,
            'address' => 'required' . $id,
            'message' => 'required' . $id,
        ], $messages);
        
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->address = $request->address;
        $testimonial->message = $request->message;
        
        $res = $testimonial->save();
        if ($res) {
            return back()->with('success', 'Testimonial updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Testimonial.');
        }
    }
    public function destroy($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $res = $testimonial->delete();
    
    if ($res) {
        return back()->with('success', 'Testimonial deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Testimonial.');
    }
}

//view frontend
public function testimonialview()
{
    $paymentMethods = PaymentMethod::all(); 
    $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $khojsansarservice= KhojsansarServices::all();
    return view('frontend/testimonial-page', compact('testimonials','sitesetting','contact','partners','khojsansarservice'));

}
}
