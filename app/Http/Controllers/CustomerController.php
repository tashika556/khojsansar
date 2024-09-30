<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Authorize;
use App\Models\Category;
use App\Models\Municipality;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerController extends Controller
{

    public function login()
    {
        $sitesetting = SiteSetting::first();

        return view('customer/login',compact('sitesetting'));
    }
    public function termscond()
    {

        return view('customer.term');
    }
    public function forgetpassword()
    {

        return view('customer.forget-password');
    }
    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $customer = Customer::where('email', $request->email)->first();
    
        if (!$customer) {
            return back()->with('fail', 'Sorry, this email is not registered.');
        }
    
        $code = Str::random(6);
    
        DB::table('password_resets')->updateOrInsert(
            ['email' => $customer->email],
            [
                'token' => $code,
                'created_at' => now()
            ]
        );
    
        Mail::send('email.reset-code', ['code' => $code, 'customer' => $customer], function ($message) use ($customer) {
            $message->to($customer->email);
            $message->subject('Password Reset Code');
        });
    
        return redirect()->route('customer.reset-password', ['email' => $customer->email])
            ->with('success', 'A verification code has been sent to your email address. It will expire in 10 minutes.');
    }
    
    public function showResetPasswordForm(Request $request)
    {
        return view('customer.reset-password')->with(['email' => $request->email]);
    }
    
    public function resetPassword(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'password.same' => 'The password and confirmation password must match.',
        ];
    
        $request->validate([
            'code' => 'required|string',
            'email' => 'required|email', 
            'password' => 'required|min:8|max:12|required_with:cpassword|same:cpassword',
            'cpassword' => 'required|min:8|max:12',
        ], $messages);
    
        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->first();
    
        if (!$resetRecord) {
            return back()->with('fail', 'Invalid verification code or email.');
        }
    
        if (Carbon::parse($resetRecord->created_at)->addMinutes(10)->isPast()) {
            return back()->with('fail', 'The verification code has expired.');
        }
    
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            $customer->password = Hash::make($request->password);
            $customer->save();
    
            DB::table('password_resets')->where('email', $request->email)->delete();
    
            return redirect()->route('customer.login')->with('success', 'Your password has been reset successfully.');
        }
    
        return back()->with('fail', 'Unable to reset password. Please try again.');
    }
    

    public function signup()
    {
        $data = [];
        $data['provinces'] = Province::get(["province_name", "id"]);
        $data['districts'] = District::get(["district_name", "id"]);
        $data['authorizes'] = Authorize::get(["authorize_name", "id"]);
        $data['categories'] = Category::get(["category_name", "id"]);
        $sitesetting = SiteSetting::first();

        return view('customer/signup', $data,compact('sitesetting'));
    }
    
    public function signupform(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'phone.unique' => 'The phone number is already registered.',
            'email.unique' => 'The email address is already registered.',
            'password.same' => 'The password and confirmation password must match.',
            'email' => 'The :attribute must use a valid email address',
            'agree.accepted' => 'You must accept the terms and conditions.',
                       'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha',
        ];

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'business' => 'required',
            'category' => 'required',
            'phone' => 'required|unique:customers',
            'user_name' => 'required|unique:customers',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8|max:12|required_with:cpassword|same:cpassword',
            'cpassword' => 'required|min:8|max:12',
             'g-recaptcha-response' => 'required|recaptcha'
         
        ], $messages);

        $customer = new Customer;
        $customer->authorize = $request->authorize;
        $customer->first_name = $request->first_name;
        $customer->middle_name = $request->middle_name;
        $customer->last_name = $request->last_name;
        $customer->business = $request->business;
        $customer->category = $request->category;
        $customer->permanent_state = $request->permanent_state;
        $customer->permanent_district = $request->permanent_district;
        $customer->permanent_municipality = $request->permanent_municipality;
        $customer->permanent_ward = $request->permanent_ward;
        $customer->permanent_tole = $request->permanent_tole;
        $customer->permanent_city = $request->permanent_city;
        $customer->user_name = $request->user_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->cell = $request->cell;
        $customer->password = Hash::make($request->password);
        $customer->cpassword = Hash::make($request->cpassword);
        $customer->agree = $request->has('agree');
     
        $res = $customer->save();
    
        if ($res) {
            return back()->with('success', 'Congratulations, your form registration is successful. Your OTP for login will be sent shortly to your email address after verification.');
        } else {
            return back()->with('fail', 'Sorry, your form could not be registered.');
        }
    }

    public function loginform(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'otp' => 'required',
        ]);
    
        $customer = Customer::where('email', '=', $request->email)->first();
    
        if ($customer) {
            if (Hash::check($request->password, $customer->password)) {
                if ($request->otp === $customer->otp) { 
                    if ($request->is('api/*')) {
                        // Generate JWT token
                        $token = JWTAuth::fromUser($customer);
                        // Generate refresh token
                        $refreshToken = $this->generateRefreshToken($customer);
    
                        return response()->json([
                            'success' => true,
                            'token' => $token,
                            'refresh_token' => $refreshToken,
                            'message' => 'Login successful'
                        ], 200);
                    } else {
                        $request->session()->put('loginId', $customer->id);
                        return redirect('customerhome');
                    }
                } else {
                    return $request->is('api/*')
                        ? response()->json(['success' => false, 'message' => 'Invalid OTP'], 401)
                        : back()->with('fail', 'Invalid OTP');
                }
            } else {
                return $request->is('api/*')
                    ? response()->json(['success' => false, 'message' => 'Password does not match'], 401)
                    : back()->with('fail', 'Password does not match');
            }
        } else {
            return $request->is('api/*')
                ? response()->json(['success' => false, 'message' => 'Please, Register first'], 404)
                : redirect()->route('customer.signup')->with('fail', 'Please, Register first');
        }
    }

    private function generateRefreshToken($customer)
    {
    
        return Str::random(60);
    }
    

    public function customerhome ()
    {
    
    if (Session::has('loginId')) {
       $customer = Customer::where('id', '=', Session::get('loginId'))->first();
       $authorizes = Authorize::all();
       $category = Category::all();
       $provinces = Province::all();
       $business = Business::where('customer', '=', $customer->id)->first();
       $sitesetting = SiteSetting::first();
       $contact = Contact::first();
       return view('customer/form-user/personal', compact('customer','authorizes','category','provinces','sitesetting','contact', 'business'));
    }
    else{
       return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
    }
    }
public function updatepersonalform(Request $request, $id)
{
    $messages = [
        'required' => 'The :attribute field is required.',
        'phone.unique' => 'The phone number is already registered.',
        'email.unique' => 'The email address is already registered.',
        'email' => 'The :attribute must use a valid email address',

    ];

    $request->validate([
        'address' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'business' => 'required',
        'category' => 'required',
        'phone' => 'required|unique:customers,phone,'.$id,
        'email' => 'required|email|unique:customers,email,'.$id,
        'permanent_city' => 'required',
    

    ], $messages);

    $customer = Customer::findOrFail($id);
    $customer->authorize = $request->authorize;
    $customer->first_name = $request->first_name;
    $customer->middle_name = $request->middle_name;
    $customer->last_name = $request->last_name;
    $customer->business = $request->business;
    $customer->category = $request->category;
    $customer->permanent_state = $request->permanent_state ?? $customer->permanent_state;
    $customer->permanent_district = $request->permanent_district ?? $customer->permanent_district;
    $customer->permanent_municipality = $request->permanent_municipality ?? $customer->permanent_municipality;
    $customer->permanent_ward = $request->permanent_ward;
    $customer->permanent_tole = $request->permanent_tole;
    $customer->permanent_city = $request->permanent_city;
    $customer->temporary_state = $request->temporary_state ?? $customer->temporary_state;
    $customer->temporary_district = $request->temporary_district ?? $customer->temporary_district;
    $customer->temporary_municipality = $request->temporary_municipality ?? $customer->temporary_municipality;
    $customer->temporary_ward = $request->temporary_ward;
    $customer->temporary_tole = $request->temporary_tole;
    $customer->temporary_city = $request->temporary_city;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->email = $request->email;
    $customer->cell = $request->cell;
    $res = $customer->save();

    if ($res) {
        session(['personalFormCompleted' => true]);
        return redirect()->route('businessview')->with('success', 'Your personal information has been updated successfully.');
 
    } else {
        return back()->with('fail', 'Sorry, there was an error updating your information.');
    }
}
public function logout(Request $request)
{

    $request->session()->forget('loginId');

    $request->session()->regenerate();

    return redirect('/customerlogin')->with('success', 'You have been logged out successfully');
}

    }
   
