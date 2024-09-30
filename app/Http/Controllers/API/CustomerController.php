<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Authorize;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    
use ApiResponseTrait;


  /**
 * @OA\Post(
 *     path="/api/customer/register",
 *     summary="Customer registration",
 *     tags={"Registration"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="authorize", type="integer", example=1),
 *             @OA\Property(property="first_name", type="string", example="John"),
 *             @OA\Property(property="middle_name", type="string", example="Michael"),
 *             @OA\Property(property="last_name", type="string", example="Doe"),
 *             @OA\Property(property="business", type="string", example="Business Name"),
 *             @OA\Property(property="category", type="integer", example=1),
 *             @OA\Property(property="permanent_state", type="integer", example=1),
 *             @OA\Property(property="permanent_district", type="integer", example=2),
 *             @OA\Property(property="permanent_municipality", type="integer", example=1),
 *             @OA\Property(property="permanent_ward", type="integer", example=5),
 *             @OA\Property(property="permanent_tole", type="string", example="Tole Name"),
 * @OA\Property(property="permanent_city", type="string", example="City Name"),
 *             @OA\Property(property="user_name", type="string", example="johndoe"),
 *             @OA\Property(property="phone", type="string", example="1234567890"),
 *             @OA\Property(property="cell", type="string", example="9876543210"),
 *             @OA\Property(property="email", type="string", example="customer@example.com"),
 *             @OA\Property(property="password", type="string", example="yourpassword"),
 *             @OA\Property(property="cpassword", type="string", example="yourpassword"),
 *             @OA\Property(property="agree", type="boolean", example=true),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Registration successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Registration successful"),
 *             @OA\Property(property="data", type="object", 
 *                 @OA\Property(property="customer_id", type="integer", example=1)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Validation error"),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="field_name", type="array", @OA\Items(type="string", example="The field is required"))
 *             )
 *         )
 *     )
 * )
 */

public function apiSignup(Request $request)
{
  

    $validator = Validator::make($request->all(), [
        'authorize' => 'required',
        'first_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'last_name' => 'required|string',
        'business' => 'required|string',
        'category' => 'required',
        'permanent_state' => 'required',
        'permanent_district' => 'required',
        'permanent_municipality' => 'required',
        'permanent_ward' => 'required|integer',
        'permanent_tole' => 'required|string',
        'user_name' => 'required|string|unique:customers',
        'phone' => 'required|string|unique:customers',
        'cell' => 'nullable|string',
        'email' => 'required|email|unique:customers',
        'password' => 'required|min:8|max:12|required_with:cpassword|same:cpassword',
        'cpassword' => 'required|min:8|max:12',
        'agree' => 'accepted',
    ]);

    if ($validator->fails()) {
        return $this->apiResponse(false, 'Validation error', [
            'errors' => $validator->errors()
        ], 400);
    }

    $customer = new Customer();
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
    $customer->cell = $request->cell;
    $customer->email = $request->email;
    $customer->password = Hash::make($request->password);
    $customer->cpassword = Hash::make($request->cpassword);
    $customer->agree = $request->has('agree');

    if ($customer->save()) {
        return $this->apiResponse(true, 'Registration successful', [
            'customer_id' => $customer->id
        ], 201);
    } else {
        return $this->apiResponse(false, 'Registration failed', [], 400);
    }
}


/**
 * @OA\Post(
 *     path="/api/customer/login",
 *     summary="Customer login",
 *     tags={"Login"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", example="customer@example.com"),
 *             @OA\Property(property="password", type="string", example="yourpassword"),
 *             @OA\Property(property="otp", type="string", example="123456"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Login successful"),
 *             @OA\Property(property="data", type="object", 
 *                 @OA\Property(property="token", type="string", example="jwt_token_here"),
 *                 @OA\Property(property="refresh_token", type="string", example="refresh_token_here")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Invalid credentials",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Invalid OTP or password")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Customer not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Please, Register first")
 *         )
 *     )
 * )
 */


 public function login(Request $request)
 {
     $request->validate([
         'email' => 'required',
         'password' => 'required',
         'otp' => 'required',
     ]);
 
     $customer = Customer::where('email', $request->email)->first();
 
     if ($customer) {
         if (Hash::check($request->password, $customer->password) && $request->otp === $customer->otp) {
             $token = JWTAuth::fromUser($customer);
          
             $refreshToken = $this->generateRefreshToken($customer); 
 
             return $this->apiResponse(true, 'Login successful', [
                 'token' => $token,
                 'refresh_token' => $refreshToken 
             ]);
         }
 
         return $this->apiResponse(false, 'Invalid OTP or password', [], 401);
     }
 
     return $this->apiResponse(false, 'Please, Register first', [], 404);
 }
 

 private function generateRefreshToken($customer)
 {
 
     return Str::random(60); 
 }
 

    /**
 * @OA\Post(
 *     path="/api/customer/forget-password",
 *     summary="Send reset code to customer email",
 *     tags={"Forget Password"},
 *     @OA\Parameter(
 *         name="email",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string", format="email")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Reset code sent successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Email not registered",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
public function apiSendResetCode(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $customer = Customer::where('email', $request->email)->first();

    if (!$customer) {
        return $this->apiResponse(false, 'Email not registered', [], ['error' => 'Email not found'], 404);
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

    return $this->apiResponse(true, 'Verification code sent successfully', [], [], 200);
}


/**
 * @OA\Post(
 *     path="/api/customer/reset-password",
 *     summary="Reset customer password using reset code",
 *     tags={"Forget Password"},
 *     @OA\Parameter(
 *         name="code",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *      @OA\Parameter(
 *         name="email",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string", format="email")
 *     ),
 *     @OA\Parameter(
 *         name="password",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string", minLength=8, maxLength=12)
 *     ),
 *     @OA\Parameter(
 *         name="cpassword",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="string", minLength=8, maxLength=12)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password reset successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid verification code",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No account found with that email address",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
public function apiResetPassword(Request $request)
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
        return $this->apiResponse(false, 'Invalid verification code or email', [], ['error' => 'Invalid verification code or email'], 400);
    }

    if (Carbon::parse($resetRecord->created_at)->addMinutes(10)->isPast()) {
        return $this->apiResponse(false, 'Verification code has expired', [], ['error' => 'Verification code expired'], 400);
    }

    $customer = Customer::where('email', $request->email)->first();
    if ($customer) {
        $customer->password = Hash::make($request->password);
        $customer->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return $this->apiResponse(true, 'Password reset successfully', [], [], 200);
    }

    return $this->apiResponse(false, 'Unable to reset password. Please try again.', [], ['error' => 'Password reset failed'], 500);
}
}
