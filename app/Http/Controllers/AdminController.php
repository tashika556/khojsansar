<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\PaymentMethod;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function profile()
    {
        $paymentMethods = PaymentMethod::all(); 

        $admin =Admin::find(session('ADMIN_ID'));
        return view('admin.profile.profile',compact('admin','paymentMethods'));
    }
        

    public function editprofile()
    {  
        $paymentMethods = PaymentMethod::all(); 
          $admin = Admin::find(session('ADMIN_ID'));
         return view('admin.profile.editprofile', compact('admin','paymentMethods'));
       
    }
    public function updateprofile(Request $request, $id)
    {
        $messages = [
            'email.unique' => 'This email is already registered.',
            'username.unique' => 'This username is already registered',
        ];
    
        $request->validate([
            'email' => 'required|email|unique:admins,email,' . $id,
            'username' => 'required|unique:admins,username,' . $id,
        ], $messages);
    
        $admin = Admin::find(session('ADMIN_ID'));
    
        if (!$admin) {
            return redirect()->back()->with('fail', 'This user doesnot exist.');
        }
    
        $admin->username = $request->username;
        $admin->email = $request->email;

        $res = $admin->update();
    
        if ($res) {

            return redirect()->back()->with('success', 'Admin Profile is updated.');
        } else {
            return redirect()->back()->with('fail', 'Sorry, Profile couldnot be updated.');
        }
    }
    public function editpassword()
    {  $paymentMethods = PaymentMethod::all(); 
        $admin = Admin::find(session('ADMIN_ID'));
        return view('admin.profile.editpassword', compact('admin','paymentMethods'));
    }
    public function updatepasswords(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required|min:8|max:12',
            'password' => 'required|min:8|max:12|different:oldpassword',
        ]);
      
        $admin = Admin::find(session('ADMIN_ID'));
            if ($admin && Hash::check($request->get('oldpassword'), $admin->password)) {
                $admin->password = Hash::make($request->password);
                if ($admin->save()) {
                    return back()->with('success', 'Password has been changed successfully.');
                } else {
                    return back()->with('fail', 'Sorry, Password couldnot be updated.');
                }
            } else {
                return back()->with('fail', 'Sorry, Old Password is Invalid.');
            }
        
    }
    public function display(Request $request)
    {
        
        $sitesetting = SiteSetting::first();
    $contact = Contact::first();
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login',compact('sitesetting','contact'));
        }
        return view('admin.login',compact('sitesetting','contact'));
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
        $paymentMethods = PaymentMethod::all();
    

        $pendingCount = Customer::where('admin_verified', 0)->where('admin_rejected', 0)->count();
        $verifiedCount = Customer::where('admin_verified', 1)->where('admin_rejected', 0)->count();
        $rejectedCount = Customer::where('admin_rejected', 1)->where('admin_verified', 0)->count();

        $pendingPaymentsCount = Payment::where('admin_payment_confirmation', 0)
        ->where('payment_confirmation', 1)->count(); 

        return view('admin.dashboard', compact('paymentMethods', 'pendingCount', 'verifiedCount', 'rejectedCount', 'pendingPaymentsCount'));
    }
    
    public function adminlogout(Request $request)
    {
        session()->forget('ADMIN_LOGIN', true);
        session()->forget('ADMIN_ID');
        session()->flash('fail', 'Logout Succesfull.');
        return redirect('digisoft');
    }
    public function pendingcustomers()
    {$paymentMethods = PaymentMethod::all(); 
        $customer =Customer::where('admin_verified', '=', 0)->where('admin_rejected', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.customers.pending.pending',compact('paymentMethods','customer'));
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
            $paymentMethods = PaymentMethod::all(); 
            $customer = Customer::findOrFail($id);
            return view('admin.customers.pending.pendingview', compact('paymentMethods','customer'));

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
    $paymentMethods = PaymentMethod::all();
    $customer =Customer::where('admin_verified', '=', 1)->where('admin_rejected', '=', 0)->orderBy('created_at', 'desc')->get();
    return view('admin.customers.verified.verified',compact('paymentMethods','customer'));
}

    public function viewverifiedcustomers($id)
    {
        $paymentMethods = PaymentMethod::all();
        $customer = Customer::findOrFail($id);
        return view('admin.customers.verified.verifiedview', compact('paymentMethods','customer'));

} 
public function rejectedcustomers()
{
    $paymentMethods = PaymentMethod::all();
    $customer =Customer::where('admin_verified', '=', 0)->where('admin_rejected', '=', 1)->orderBy('created_at', 'desc')->get();
    return view('admin.customers.rejected.rejected',compact('paymentMethods','customer'));
}

    public function viewrejectedcustomers($id)
    {
        $paymentMethods = PaymentMethod::all();
        $customer = Customer::findOrFail($id);
        return view('admin.customers.rejected.rejectedview', compact('paymentMethods','customer'));

} 

}
