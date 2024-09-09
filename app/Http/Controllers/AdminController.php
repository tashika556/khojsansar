<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function display(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
        return view('admin.login');
    }
    public function authadmin(Request $request)
    {
        $name=$request->post('username');
        $password=$request->post('password');

        $result=Admin::where(['username'=>$name])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('fail','***Please Enter the correct password***');
                return redirect('digisoft');
            }

        }
        else{
            $request->session()->flash('fail','***Please enter valid login details***');
            return redirect('digisoft');
        }
    }
    public function dashboard()
    {
      
        return view('admin.dashboard');
    }
    public function adminlogout(Request $request)
    {
        session()->forget('ADMIN_LOGIN', true);
        session()->forget('ADMIN_ID');
        session()->flash('fail', 'Logout Succesfull.');
        return redirect('digisoft');
    }
    public function pendingcustomers()
    {
        $customer =Customer::where('admin_verified', '=', 0)->where('admin_rejected', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.customers.pending.pending',compact('customer'));
    }
    public function destroycustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $res = $customer->delete();
        
        if ($res) {
            return back()->with('success', 'Customer deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete the Customer.');
        }
    }
        public function viewpendingcustomers($id)
        {
            $customer = Customer::findOrFail($id);
            return view('admin.customers.pending.pendingview', compact('customer'));

} 
public function verifypendingCustomer($id)
{
    $customer = Customer::findOrFail($id);
    $customer->admin_verified = true; 
    $customer->admin_rejected = false; 

    $res = $customer->save();
    if($res){
    $serialNumber = str_pad(($customer->id ?? 1) % 100, 2, '0', STR_PAD_LEFT);
    $ward_numbers = $customer->permanent_ward;
    $user_names = $customer->user_name;

    $otp = 'KSN' . $ward_numbers . date('mdy') . $user_names . $serialNumber;
    $customer->otp = $otp;
    $customer->save();
    Mail::send('email/otp-verification', ["customer" => $customer], function($message) use ($customer) {
        $message->to($customer->email);
        $message->subject('Customer Data Verified');
    });
    return redirect()->route('pendingcustomers')->with('success', 'Customer Verified successfully.');
}
else{
    return back()->with('fail', 'Sorry, Something is wrong.');
}
}
public function rejectpendingCustomer(Request $request, $id)
{
    $customer = Customer::findOrFail($id);
    $customer->admin_verified = false;
    $customer->admin_rejected = true;
    $customer->rejection_reason = $request->input('rejection_reason');
    $res = $customer->save();
   
  if($res){
    Mail::send('email/customer-rejection', ["customer" => $customer], function($message) use ($customer) {
        $message->to($customer->email);
        $message->subject('Customer Data Verification Rejected');
    });

    return redirect()->route('pendingcustomers')->with('success', 'Customer Rejected successfully.');
}
else{
    return back()->with('fail', 'Sorry, Something is wrong.');
}
}


public function verifiedcustomers()
{
    $customer =Customer::where('admin_verified', '=', 1)->where('admin_rejected', '=', 0)->orderBy('created_at', 'desc')->get();
    return view('admin.customers.verified.verified',compact('customer'));
}

    public function viewverifiedcustomers($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.verified.verifiedview', compact('customer'));

} 
public function rejectedcustomers()
{
    $customer =Customer::where('admin_verified', '=', 0)->where('admin_rejected', '=', 1)->orderBy('created_at', 'desc')->get();
    return view('admin.customers.rejected.rejected',compact('customer'));
}

    public function viewrejectedcustomers($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.rejected.rejectedview', compact('customer'));

} 

}
