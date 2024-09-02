<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    public function login()
    {

        return view('customer/login');
    }
    public function signup()
    {
        $data = [];
        $data['provinces'] = Province::get(["province_name", "id"]);
        $data['districts'] = District::get(["district_name", "id"]);
        return view('customer/signup', $data);
    }

    public function signupform(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'phone.unique' => 'The phone number is already registered.',
            'email.unique' => 'The email address is already registered.',
            'password.same' => 'The password and confirmation password must match.',
            'email' => 'The :attribute must use a valid email address',
    
        ];
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'business' => 'required',
            'category' => 'required',
            'phone' => 'required|unique:customers', 
            'username' => 'required|unique:customers', 
            'email' => 'required|email|unique:customers',
      'password' => 'required|min:8|max:12|required_with:cpassword|same:cpassword',
            'cpassword' => 'required|min:8|max:12'
    
        ], $messages);
       
    
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->middle_name = $request->middle_name;
        $customer->last_name = $request->last_name;
        $customer->business = $request->business;
        $customer->category = $request->category;
        $customer->citizenship_number = $request->citizenship_number;
        $customer->citizenship_date = $request->citizenship_date;
        $customer->citizenship_district = $request->citizenship_district;
        $customer->permanent_state = $request->permanent_state;
        $customer->permanent_district = $request->permanent_district;
        $customer->permanent_municipality = $request->permanent_municipality;
        $customer->temporary_state = $request->temporary_state;
        $customer->temporary_district = $request->temporary_district;
        $customer->temporary_municipality = $request->temporary_municipality;
        $customer->permanent_muniward = $request->permanent_muniward;
        $customer->permanent_tole = $request->permanent_tole;
        $customer->temporary_ward = $request->temporary_ward;
        $customer->temporary_tole = $request->temporary_tole;
        $customer->username = $request->username;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->cell = $request->cell;
        $customer->password = Hash::make($request->password);
        $customer->cpassword = Hash::make($request->cpassword);
    
        $res = $customer->save();
    
    
        if ($res) {
            $serialNumber = str_pad($customer->id % 100, 2, '0', STR_PAD_LEFT);
            $serialWard = str_pad($customer->ward % 100, 2, '0', STR_PAD_LEFT);
            $municipalityName = $customer->permanentMunicipality->municipality_shortname;
            $otp = $municipalityName . $serialWard . date('m d y') . $serialNumber;
            $customer->otp = $otp;
            $customer->save();
             
        
        Mail::send('email/otp-verification', ["customer" => $customer], function($message) use ($customer) {
            $message->to($customer->email);
            $message->subject('Register Successful');
        });
            return back()->with('success', 'Congratulations, your form registration is successful. Login now to continue. Please check for OTP. ');
        } else {
            return back()->with('fail', 'Sorry, your Form could not be registered.');
        }
    
      
    }
}