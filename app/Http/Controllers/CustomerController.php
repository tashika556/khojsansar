<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Authorize;
use App\Models\Category;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;


class CustomerController extends Controller
{
    /**
 * @OA\Get(
 *     path="/customerlogin",
 *     summary="Display Customer Login Page",
 *     @OA\Response(
 *         response=200,
 *         description="Displays the login page for customers"
 *     )
 * )
 */
    public function login()
    {

        return view('customer/login');
    }
    public function termscond()
    {

        return view('customer.term');
    }
    /**
 * @OA\Get(
 *     path="/customersignup",
 *     summary="Display Customer Signup Page",
 *     @OA\Response(
 *         response=200,
 *         description="Displays the signup page for customers"
 *     )
 * )
 */
    public function signup()
    {
        $data = [];
        $data['provinces'] = Province::get(["province_name", "id"]);
        $data['districts'] = District::get(["district_name", "id"]);
        $data['authorizes'] = Authorize::get(["authorize_name", "id"]);
        $data['categories'] = Category::get(["category_name", "id"]);
        return view('customer/signup', $data);
    }
    /**
     * @OA\Post(
     *     path="/reg-form",
     *     summary="Customer Signup",
     *     description="Registers a new customer with the provided information.",
     *     tags={"Customer"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="first_name", type="string"),
     *             @OA\Property(property="last_name", type="string"),
     *             @OA\Property(property="business", type="string"),
     *             @OA\Property(property="category", type="string"),
     *             @OA\Property(property="phone", type="string"),
     *             @OA\Property(property="user_name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password"),
     *             @OA\Property(property="cpassword", type="string", format="password"),
     *             @OA\Property(property="agree", type="boolean")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registration successful",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(response=500, description="Registration failed")
     * )
     */
    public function signupform(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'phone.unique' => 'The phone number is already registered.',
            'email.unique' => 'The email address is already registered.',
            'password.same' => 'The password and confirmation password must match.',
            'email' => 'The :attribute must use a valid email address',
            'agree.accepted' => 'You must accept the terms and conditions.',
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
        $customer->temporary_state = $request->temporary_state;
        $customer->temporary_district = $request->temporary_district;
        $customer->temporary_municipality = $request->temporary_municipality;
        $customer->temporary_ward = $request->temporary_ward;
        $customer->temporary_tole = $request->temporary_tole;
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
                $request->session()->put('loginId', $customer->id);
                return redirect('customerhome');
            } else {
                return back()->with('fail', 'Invalid OTP');
            }
        } else {
            return back()->with('fail', 'Password doesnot match');
        }
    } else {
        $request->session()->flash('fail', 'Please, Register first');
        return view('customer/signup');
    }
}

public function customerhome ()
{

if (Session::has('loginId')) {
   $customer = Customer::where('id', '=', Session::get('loginId'))->first();
   $authorizes = Authorize::all();
   $category = Category::all();
   $provinces = Province::all();
   return view('customer/form-user/personal', compact('customer','authorizes','category','provinces'));
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
    $customer->temporary_state = $request->temporary_state ?? $customer->temporary_state;
    $customer->temporary_district = $request->temporary_district ?? $customer->temporary_district;
    $customer->temporary_municipality = $request->temporary_municipality ?? $customer->temporary_municipality;
    $customer->temporary_ward = $request->temporary_ward;
    $customer->temporary_tole = $request->temporary_tole;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->email = $request->email;
    $customer->cell = $request->cell;
    $res = $customer->save();

    if ($res) {
        return redirect()->route('businessview')->with('success', 'Your personal information has been updated successfully.');
 
    } else {
        return back()->with('fail', 'Sorry, there was an error updating your information.');
    }
}

    }
   
