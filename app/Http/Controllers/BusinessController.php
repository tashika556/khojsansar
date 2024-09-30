<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\PaymentMethod;
use App\Models\Payment;
use App\Models\Authorize;
use App\Models\Category;
use App\Models\Municipality;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


class BusinessController extends Controller
{
   public function business()
   {
       $customer = [];
       if (Session::has('loginId')) {
        
           $customer = Customer::where('id', '=', Session::get('loginId'))->first();

           $business = Business::where('customer', '=', $customer->id)->first();
           $sitesetting = SiteSetting::first();
           $contact = Contact::first();
           $authorizes = Authorize::all();
           $category = Category::all();
           $provinces = Province::all();

           return view('customer/form-user/business', compact('customer', 'authorizes', 'category', 'provinces', 'business','sitesetting','contact'));
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
           'website_url' => 'required|url',
           'phone_one' => 'required|string',
           'phone_two' => 'nullable|string',
           'email_one' => 'required|email',
           'email_two' => 'nullable|email',
           'logo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
           'coverimage' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
       ], $messages);
   
       $businessData = [
           'summary' => $request->summary,
           'address' => $request->address,
           'state' => $request->state,
           'district' => $request->district,
           'municipality' => $request->municipality,
           'ward' => $request->ward,
           'tole' => $request->tole,
           'latitude' => $request->latitude,
           'longitude' => $request->longitude,
           'website_url' => $request->website_url,
           'phone_one' => $request->phone_one,
           'phone_two' => $request->phone_two,
           'email_one' => $request->email_one,
           'email_two' => $request->email_two,
           'openeveryday' => $request->has('openeveryday') ? 1 : 0,
       ];
   
       if ($request->hasFile('logo')) {
           $file = $request->file('logo');
           $extension = $file->getClientOriginalExtension();
           $filename = time() . '.' . $extension;
           $file->move('uploads/businesslogo', $filename);
           $businessData['logo'] = $filename;
       }
   
       if ($request->hasFile('coverimage')) {
           $file = $request->file('coverimage');
           $extension = $file->getClientOriginalExtension();
           $filename = time() . '.' . $extension;
           $file->move('uploads/businesscoverimage', $filename);
           $businessData['coverimage'] = $filename;
       }
   
       $business = Business::updateOrCreate(['customer' => $id], $businessData);
   
       if ($business->payment) {
           $business->payment->update([
               'admin_payment_confirmation' => 0,
               'rejection_reason' => NULL,
           ]);
       }
   
       if ($business) {
           session(['businessFormCompleted' => true]);
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
    public function pendingbusiness()
    {
        $paymentMethods = PaymentMethod::all(); 

        $business = Business::with('payment')->whereHas('payment', function ($query) {
            $query->where('payment_confirmation', 1)
                  ->where('admin_payment_confirmation', 0)
                  ->whereNull('rejection_reason'); 
        })->get();
        
        return view('admin.business.pending.pending', compact('business', 'paymentMethods'));
    }
    
    public function viewpendingbusiness($id)
    { $paymentMethods = PaymentMethod::all(); 
        $business = Business::findOrFail($id);
        return view('admin.business.pending.pendingview', compact('business','paymentMethods'));

} 
public function notapprovedbusiness()
{
    $paymentMethods = PaymentMethod::all(); 

    $business = Business::with(['payment' => function ($query) {
        $query->where('payment_confirmation', 1)
              ->where('admin_payment_confirmation', 0)
              ->whereNotNull('rejection_reason'); 
    }])->whereHas('payment', function ($query) {
        $query->where('payment_confirmation', 1)
              ->where('admin_payment_confirmation', 0)
              ->whereNotNull('rejection_reason');
    })->get();
    
    return view('admin.business.notapproved.notapproved', compact('business', 'paymentMethods'));
}
public function viewnotapprovedbusiness($id)
{ $paymentMethods = PaymentMethod::all(); 
    $business = Business::findOrFail($id);
    return view('admin.business.notapproved.notapprovedview', compact('business','paymentMethods'));

}

    public function verifiedbusiness()
    {
        $paymentMethods = PaymentMethod::all(); 

        $business = Business::with('payment')->whereHas('payment', function ($query) {
            $query->where('payment_confirmation', 1)
                  ->where('admin_payment_confirmation', 1);
        })->get();;
        return view('admin.business.verified.verified',compact('business','paymentMethods'));
    }
    public function viewverifiedbusiness($id)
    { $paymentMethods = PaymentMethod::all(); 
        $business = Business::findOrFail($id);
        return view('admin.business.verified.verifiedview', compact('business','paymentMethods'));

} 
    public function approvePayment($id)
    {
    
        $payment = Payment::where('business', $id)->first();

        if ($payment) {
       
            $payment->admin_payment_confirmation = 1;
            $payment->save();

            return back()->with('success', 'Payment approved successfully.');
        }

        return back()->with('fail', 'No payment record found.');
    }
  
    public function rejectPayment(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ], [
            'rejection_reason.required' => 'Please provide a reason for rejection.',
        ]);
    
        $payment = Payment::where('business', $id)->with('businesses.customershow')->first();
    
        if ($payment) {
            $payment->rejection_reason = $request->rejection_reason;
            $payment->admin_payment_confirmation = 0; 
            $payment->save();
    
            $customer = $payment->businesses->customershow;
    
            try {
                Mail::send('email.payment-rejection', [
                    'customer' => $customer,
                    'rejection_reason' => $request->rejection_reason
                ], function($message) use ($customer) {
                    $message->to($customer->email);
                    $message->subject('Business Payment Data Verification Not Approved');
                });
            } catch (\Exception $e) {
                \Log::error('Email could not be sent: ' . $e->getMessage());
                return back()->with('fail', 'Payment Not Approved, but failed to notify the customer.');
            }
    
            return back()->with('success', 'Payment Not Approved successfully, and the customer has been notified.');
        }
    
        return back()->with('fail', 'No payment record found.');
    }
    public function destroybusinesspayment($id)
    {
        $payment = Payment::findOrFail($id);
        $res = $payment->delete();
        
        if ($res) {
            return back()->with('success', 'Payment of Business deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete the Payment of Business.');
        }
    }
    
}
