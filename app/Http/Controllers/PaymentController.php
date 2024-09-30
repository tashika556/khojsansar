<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\Business;
use App\Models\PaymentMethod;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\File;


class PaymentController extends Controller
{
    public function payments()
    {
        if (Session::has('loginId')) {
            $customer = Customer::find(Session::get('loginId'));
            $business = Business::where('customer', $customer->id)->first();
            $paymentmethod = PaymentMethod::latest()->first();
            $payment = Payment::where('business', $business->id)->first();
            $sitesetting = SiteSetting::first();
        $contact = Contact::first();
            return view('customer.form-user.payment', compact('business', 'paymentmethod', 'customer', 'payment','sitesetting','contact'));
        } else {
            return back()->with('fail', 'Sorry, you do not have the right to access it. First, login to continue.');
        }
    }
    
    public function store(Request $request, $customerId)
{
    $request->validate([
        'payment_receipt' => 'sometimes|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'payment_confirmation' => 'required|boolean',
    ], [
        'payment_receipt.required' => 'Please upload your payment receipt.',
        'payment_confirmation.required' => 'Please confirm your payment.',
    ]);

    $business = Business::where('customer', $customerId)->first();
    
    if (!$business) {
        return back()->with('fail', 'Business not found.');
    }

    $payment = Payment::updateOrCreate(
        ['business' => $business->id],
        ['payment_confirmation' => $request->input('payment_confirmation')]
    );

    if ($request->hasFile('payment_receipt')) {
        $destination = 'uploads/payment_receipt/' . $payment->payment_receipt;
  
        if (File::exists($destination)) {
            File::delete($destination);
        }
 
        $file = $request->file('payment_receipt');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        
        if ($file->move('uploads/payment_receipt/', $filename)) {
            \Log::info('File uploaded successfully: ' . $filename);
            $payment->payment_receipt = $filename;
        } else {
            \Log::error('Failed to move uploaded file.');
            return back()->with('fail', 'File upload failed.');
        }
    }

    $payment->save();

    if ($payment) {
        return back()->with('success', 'Your payment has been submitted successfully.');
    } else {
        return back()->with('fail', 'Sorry, there was an error submitting your payment.');
    }
}
public function businesspayment()
{
    $paymentMethods = PaymentMethod::all(); 

    $payment = Payment::where('payment_confirmation', 1)
    ->where('admin_payment_confirmation', 1)
    ->get();
    
    
    return view('admin.payment.businesspayment.list',compact('payment','paymentMethods'));
}
public function viewbusinesspayment($id)
{ $paymentMethods = PaymentMethod::all(); 
    $payment = Payment::findOrFail($id);
    return view('admin.payment.businesspayment.view', compact('payment','paymentMethods'));

} 
}
