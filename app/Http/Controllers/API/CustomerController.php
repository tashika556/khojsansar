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
/**
 * @OA\Post(
 *     path="/api/customer/update-password",
 *     summary="Update the customer's password",
 *     tags={"Customer Change Password"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"oldpassword", "password", "cpassword"},
 *             @OA\Property(property="oldpassword", type="string", example="oldpassword123"),
 *             @OA\Property(property="password", type="string", example="newpassword123"),
 *             @OA\Property(property="cpassword", type="string", example="newpassword123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Password updated successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation errors or other issues",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="The old password is incorrect."),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     )
 * )
 */

public function updatePasswordApi(Request $request)
{
    $customer = auth()->user(); 
    if (!$customer) {
        return $this->apiResponse(false, 'Unauthorized', [], 401);
    }
    $validator = Validator::make($request->all(), [
        'oldpassword' => 'required',
        'password' => 'required|min:8|max:12|same:cpassword',
        'cpassword' => 'required|min:8|max:12',
    ], [
        'oldpassword.required' => 'Old password is required.',
        'password.required' => 'New password is required.',
        'password.same' => 'The new password and confirmation password must match.',
        'cpassword.required' => 'Confirm password is required.',
    ]);

    if ($validator->fails()) {
        return $this->apiResponse(false, 'Validation errors', [], $validator->errors()->toArray());
    }
try{
    $customer = auth()->user(); 

    if (!$customer || !Hash::check($request->oldpassword, $customer->password)) {
        return $this->apiResponse(false, 'The old password is incorrect.');
    }

    $customer->password = Hash::make($request->password);
    $customer->save();

    return $this->apiResponse(true, 'Password updated successfully.');
} catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    return $this->apiResponse(false, 'Token is invalid', [], 401);
} catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    return $this->apiResponse(false, 'Token has expired', [], 401);
} catch (\Exception $e) {
    \Log::error('Authentication Error: ' . $e->getMessage());
    return $this->apiResponse(false, 'Internal Server Error', [], 500);
    
}
}
/**
 * @OA\Get(
 *     path="/api/customerview",
 *     summary="Customer Details Display ",
 *     tags={"Customer Data Update/Fetch"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
public function displaycustomer(Request $request)
{  
    $customer = auth()->user(); 
    if (!$customer) {
        return $this->apiResponse(false, 'Unauthorized', [], 401);
    }
 
    try {

        $customerId = $request->user()->id;

        $customer = Customer::find($customerId);
        if (!$customer) {
            return $this->apiResponse(false, 'Customer not found', [], 404);
        }
 
        return $this->apiResponse(true, 'Customer details fetched successfully', $customer, 200);
    
} catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    return $this->apiResponse(false, 'Token is invalid', [], 401);
} catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    return $this->apiResponse(false, 'Token has expired', [], 401);
} catch (\Exception $e) {
    
    return $this->apiResponse(false, 'An error occurred while fetching customer details', [], ['error' => $e->getMessage()], 500);
}
}

/**
 * @OA\Put(
 *     path="/api/customer/update",
 *     summary="Update Customer Information",
 *     tags={"Customer Data Update/Fetch"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"first_name", "last_name", "business", "category", "phone", "email", "address","permanent_state","permanent_district","permanent_municipality","permanent_ward","permanent_tole"},
 *             @OA\Property(property="authorize", type="integer", example=1),
 *             @OA\Property(property="first_name", type="string", example=""),
 *             @OA\Property(property="middle_name", type="string", example=""),
 *             @OA\Property(property="last_name", type="string", example=""),
 *             @OA\Property(property="business", type="string", example=1),
 *             @OA\Property(property="category", type="integer", example=2),
 *             @OA\Property(property="permanent_state", type="integer", example=1),
 *             @OA\Property(property="permanent_district", type="integer", example=5),
 *             @OA\Property(property="permanent_municipality", type="integer", example=12),
 *             @OA\Property(property="permanent_ward", type="integer", example=3),
 *             @OA\Property(property="permanent_tole", type="string", example="Park Street"),
 *             @OA\Property(property="temporary_state", type="integer", example=2),
 *             @OA\Property(property="temporary_district", type="integer", example=8),
 *             @OA\Property(property="permanent_city", type="string", example="Pcity"),
 *             @OA\Property(property="temporary_municipality", type="integer", example=15),
 *             @OA\Property(property="temporary_ward", type="integer", example=4),
 *             @OA\Property(property="temporary_tole", type="string", example=""),
 *             @OA\Property(property="temporary_city", type="string", example="Tcity"),
 *             @OA\Property(property="address", type="string", example=""),
 *             @OA\Property(property="phone", type="string", example="1234567890"),
 *             @OA\Property(property="email", type="string", example=""),
 *             @OA\Property(property="cell", type="string", example="")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Customer information updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Customer information has been updated successfully.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Validation Error"),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Customer not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Customer not found")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Server Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Internal Server Error")
 *         )
 *     )
 * )
 */
public function updateCustomer(Request $request)
{
   


    $user = $request->user();
    if (!$user) {
    
        return $this->apiResponse(false, 'Unauthorized', [], 401);
    }
    try {

        $customerId = $request->user()->id;

        $customer = Customer::findOrFail($customerId);

        $messages = [
            'required' => 'The :attribute field is required.',
            'phone.unique' => 'The phone number is already registered.',
            'email.unique' => 'The email address is already registered.',
            'email' => 'The :attribute must be a valid email address',
        ];

        $validator = \Validator::make($request->all(), [
            'address' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'business' => 'required|string',
            'category' => 'required|integer',
            'phone' => 'required|string|unique:customers,phone,' . $customerId,
            'email' => 'required|email|unique:customers,email,' . $customerId,
        ], $messages);

        if ($validator->fails()) {
            return $this->apiResponse(false, 'Validation Error', [
                'errors' => $validator->errors()
            ], 400);
        }

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

        $customer->save();

        return $this->apiResponse(true, 'Customer details fetched successfully', $customer, 200);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return $this->apiResponse(false, 'Customer not found', [], 404);
     } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this->apiResponse(false, 'Token is invalid', [], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return $this->apiResponse(false, 'Token has expired', [], 401);
        } catch (\Exception $e) {
         
            return $this->apiResponse(false, 'Internal Server Error', [], 500);
        }
        
}
/**
 * @OA\Get(
 *     path="/api/businessview",
 *     summary="Business Details Display ",
 *     tags={"Business Data Update/Fetch"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
public function displaybusiness(Request $request)
{
    $customer = auth()->user(); 
    if (!$customer) {
        return $this->apiResponse(false, 'Unauthorized', [], 401);
    }
    
    try {

        $business = $customer->businesses; 

  
        if (!$business) {
            return $this->apiResponse(false, 'Business not found for this customer', [], 404);
        }

        // Return the entire business model
        return $this->apiResponse(true, 'Business details fetched successfully', $business, 200);
    
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return $this->apiResponse(false, 'Token is invalid', [], 401);
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return $this->apiResponse(false, 'Token has expired', [], 401);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching business details', [], ['error' => $e->getMessage()], 500);
    }
}
/**
 * @OA\Post(
 *     path="/api/customer/updatestorebusiness",
 *     summary="Store or Update Business Information",
 *     tags={"Business Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="customer", type="integer", example=1),
 *                 @OA\Property(property="summary", type="string", example="Business summary goes here."),
 *                 @OA\Property(property="email_one", type="string", example="example@example.com"),
 *                 @OA\Property(property="email_two", type="string", example="example2@example.com"),
 *                 @OA\Property(property="phone_one", type="string", example="1234567890"),
 *                 @OA\Property(property="phone_two", type="string", example="0987654321"),
 *                 @OA\Property(property="address", type="string", example="123 Main St, City, Country"),
 *                 @OA\Property(property="website_url", type="string", example="https://www.example.com"),
 *                 @OA\Property(property="state", type="integer", example=1),
 *                 @OA\Property(property="district", type="integer", example=2),
 *                 @OA\Property(property="municipality", type="integer", example=3),
 *                 @OA\Property(property="ward", type="integer", example=4),
 *                 @OA\Property(property="tole", type="string", example="Main Tole"),
 *                 @OA\Property(property="latitude", type="string", example="27.7172"),
 *                 @OA\Property(property="longitude", type="string", example="85.3240"),
 *                 @OA\Property(property="openeveryday", type="boolean", example=true),
 *                 @OA\Property(property="logo", type="string", format="binary"),
 *                 @OA\Property(property="coverimage", type="string", format="binary")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business data updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Business data updated successfully."),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="summary", type="string", example="Business summary goes here."),
 *                 @OA\Property(property="email_one", type="string", example="example@example.com"),
 *                 @OA\Property(property="email_two", type="string", example="example2@example.com"),
 *                 @OA\Property(property="phone_one", type="string", example="1234567890"),
 *                 @OA\Property(property="phone_two", type="string", example="0987654321"),
 *                 @OA\Property(property="address", type="string", example="123 Main St, City, Country"),
 *                 @OA\Property(property="website_url", type="string", example="https://www.example.com"),
 *                 @OA\Property(property="state", type="integer", example=1),
 *                 @OA\Property(property="district", type="integer", example=2),
 *                 @OA\Property(property="municipality", type="integer", example=3),
 *                 @OA\Property(property="ward", type="integer", example=4),
 *                 @OA\Property(property="tole", type="string", example="Main Tole"),
 *                 @OA\Property(property="latitude", type="string", example="27.7172"),
 *                 @OA\Property(property="longitude", type="string", example="85.3240"),
 *                 @OA\Property(property="openeveryday", type="boolean", example=true),
 *                 @OA\Property(property="logo", type="string", example="logo_path.jpg"),
 *                 @OA\Property(property="coverimage", type="string", example="cover_image_path.jpg")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Validation Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Validation error"),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="customer", type="array", @OA\Items(type="string", example="The selected customer does not exist.")),
 *                 @OA\Property(property="email_one", type="array", @OA\Items(type="string", example="The email has already been taken.")),
 *                 @OA\Property(property="phone_one", type="array", @OA\Items(type="string", example="The phone number is required.")),
 *                 @OA\Property(property="address", type="array", @OA\Items(type="string", example="The address field is required."))
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Server Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Internal Server Error")
 *         )
 *     )
 * )
 */

 public function storeOrUpdateBusiness(Request $request)
 {
     $user = $request->user();
     if (!$user) {
         return $this->apiResponse(false, 'Unauthorized', [], 401);
     }
 
     $validator = Validator::make($request->all(), [
         'customer' => 'required|integer|exists:customers,id',
         'summary' => 'required|string',
         'email_one' => 'required|email',
         'email_two' => 'nullable|email',
         'phone_one' => 'required|string',
         'phone_two' => 'nullable|string',
         'address' => 'required|string',
         'state' => 'nullable|integer',
         'district' => 'nullable|integer',
         'municipality' => 'nullable|integer',
         'ward' => 'nullable|integer',
         'tole' => 'nullable|string',
         'website_url' => 'nullable|url',
         'latitude' => 'nullable|numeric|between:-90,90|regex:/^[-+]?[0-9]{1,2}(\.[0-9]+)?$/',
         'longitude' => 'nullable|numeric|between:-180,180|regex:/^[-+]?[0-9]{1,3}(\.[0-9]+)?$/',
         'logo' => 'sometimes|file|mimes:jpg,png,jpeg|max:2048',
         'coverimage' => 'sometimes|file|mimes:jpg,png,jpeg|max:2048',
     ]);
 
     if ($validator->fails()) {
         \Log::warning('Validation error', [
             'errors' => $validator->errors(),
             'request_data' => $request->all(),
         ]);
         return $this->apiResponse(false, 'Validation error', ['errors' => $validator->errors()], 400);
     }
 
     try {
         $business = Business::where('customer', $request->customer)->first();
         $businessData = $request->only([
             'summary', 'email_one', 'email_two', 'phone_one',
             'phone_two', 'address', 'website_url', 'state',
             'district', 'municipality', 'ward', 'tole',
             'latitude', 'longitude', 'openeveryday'
         ]);
 
         if (!$business) {
             $business = new Business();
             $business->customer = $request->customer;
             $business->fill($businessData);
 
             // Handle logo and cover image
             if ($request->hasFile('logo')) {
                 $file = $request->file('logo');
                 $extension = $file->getClientOriginalExtension();
                 $filename = time() . '.' . $extension;
                 $file->move('uploads/businesslogo', $filename);
                 $business->logo = $filename;
             } else {
                 $business->logo = null;
             }
 
             if ($request->hasFile('coverimage')) {
                 $file = $request->file('coverimage');
                 $extension = $file->getClientOriginalExtension();
                 $filename = time() . '.' . $extension;
                 $file->move('uploads/businesscoverimage', $filename);
                 $business->coverimage = $filename;
             } else {
                 $business->coverimage = null;
             }
 
             $business->save();
             return $this->apiResponse(true, 'Business created successfully.', $business->toArray(), 201);
         }
 
         $business->update($businessData);
         return $this->apiResponse(true, 'Business data updated successfully.', $business->toArray(), 200);
     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
         return $this->apiResponse(false, 'Business not found', [], 404);
     } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
         return $this->apiResponse(false, 'Token is invalid', [], 401);
     } catch (\Exception $e) {
         \Log::error('Error updating business', [
             'message' => $e->getMessage(),
             'request_data' => $request->all(),
         ]);
         return $this->apiResponse(false, 'Internal Server Error', [], 500);
     }
 }
 
    
}