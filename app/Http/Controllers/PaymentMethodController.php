<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function payment($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id); 
    
        if ($paymentMethod) {
            return view('admin.payment.qr.details', compact('paymentMethod')); 
        }
    
        return redirect()->back()->withErrors('Payment method not found!');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'qr_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'accountholder_bank_name' => 'required|string|max:255',
            'accountholder_name' => 'required|string|max:255',
            'accountholder_number' => 'required|string|max:255',
            'accountholder_branch' => 'required|string|max:255',
        ]);

        $paymentMethod = new PaymentMethod();
        $paymentMethod->accountholder_bank_name = $request->accountholder_bank_name;
        $paymentMethod->accountholder_name = $request->accountholder_name;
        $paymentMethod->accountholder_number = $request->accountholder_number;
        $paymentMethod->accountholder_branch = $request->accountholder_branch;

        if ($request->hasFile('qr_photo')) {
            $paymentMethod->qr_photo = $request->file('qr_photo')->store('qr_photos', 'public');
        }

        $paymentMethod->save();

        return redirect()->back()->with('success', 'Payment method added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'qr_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'accountholder_bank_name' => 'required|string|max:255',
            'accountholder_name' => 'required|string|max:255',
            'accountholder_number' => 'required|string|max:255',
            'accountholder_branch' => 'required|string|max:255',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->accountholder_bank_name = $request->accountholder_bank_name;
        $paymentMethod->accountholder_name = $request->accountholder_name;
        $paymentMethod->accountholder_number = $request->accountholder_number;
        $paymentMethod->accountholder_branch = $request->accountholder_branch;

        if ($request->hasFile('qr_photo')) {
            $paymentMethod->qr_photo = $request->file('qr_photo')->store('qr_photos', 'public');
        }

        $paymentMethod->save();

        return redirect()->back()->with('success', 'Payment method updated successfully!');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->back()->with('success', 'Payment method deleted successfully!');
    }
}
