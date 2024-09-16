<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\Business;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Session;

class PaymentController extends Controller
{
    public function payments()
    {
        if (Session::has('loginId')) {
            $customer = Customer::find(Session::get('loginId'));
            $business = Business::where('customer', $customer->id)->first();
            $paymentmethod = PaymentMethod::latest()->first();
            $payment = Payment::where('business', $business->id)->first();
    
            return view('customer.form-user.payment', compact('business', 'paymentmethod', 'customer', 'payment'));
        } else {
            return back()->with('fail', 'Sorry, you do not have the right to access it. First, login to continue.');
        }
    }
    
    public function store(Request $request, $customerId)
    {
        $request->validate([
            'payment_receipt' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'payment_confirmation' => 'required|boolean',
        ], [
            'payment_receipt.required' => 'Please upload your payment receipt.',
            'payment_confirmation.required' => 'Please confirm your payment.',
        ]);


        $business = Business::where('customer', $customerId)->first();

        $filename = null;
        if ($request->hasFile('payment_receipt')) {

            $payment = Payment::where('business', $business->id)->first();

            if ($payment && $payment->payment_receipt) {
                $oldFile = storage_path('app/public/payments/' . $payment->payment_receipt);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
    
            $file = $request->file('payment_receipt');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/payments', $filename);
        }
        $payment = Payment::updateOrCreate(
            ['business' => $business->id],
            [
                'payment_receipt' => $filename,
                'payment_confirmation' => $request->input('payment_confirmation'),
            ]
        );

        if ($payment) {
            return back()->with('success', 'Your payment has been submitted successfully.');
        } else {
            return back()->with('fail', 'Sorry, there was an error submitting your payment.');
        }
    }
}
