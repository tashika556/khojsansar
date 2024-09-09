<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Authorize;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/customer/customersignup",
     *     summary="Get Signup Form Data",
     *     description="Returns provinces, districts, authorizes, and categories for signup.",
     *     tags={"Customer"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns signup data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="provinces", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="districts", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="authorizes", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="categories", type="array", @OA\Items(type="string"))
     *         )
     *     )
     * )
     */
    public function signup(Request $request)
    {
        $data = [
            'provinces' => Province::get(["province_name", "id"]),
            'districts' => District::get(["district_name", "id"]),
            'authorizes' => Authorize::get(["authorize_name", "id"]),
            'categories' => Category::get(["category_name", "id"]),
        ];

        return response()->json($data, 200);
    }
    /**
     * @OA\Get(
     *     path="/terms",
     *     summary="Get Terms and Conditions",
     *     description="Returns the terms and conditions text.",
     *     tags={"Customer"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns terms and conditions",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="terms", type="string")
     *         )
     *     )
     * )
     */
    public function termscond()
    {
        return response()->json(['terms' => 'Here are the terms and conditions...'], 200);
    }
     /**
     * @OA\Post(
     *     path="/api/login-form",
     *     summary="Customer Login",
     *     description="Logs in a customer with email, password, and OTP.",
     *     tags={"Customer"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password"),
     *             @OA\Property(property="otp", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successful",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="token", type="string"),
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Invalid OTP or Password"),
     *     @OA\Response(response=404, description="Please register first")
     * )
     */
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
                    $token = $customer->createToken('API Token')->plainTextToken;
                    return response()->json([
                        'token' => $token,
                        'message' => 'Login successful',
                    ], 200);
                } else {
                    return response()->json(['message' => 'Invalid OTP'], 400);
                }
            } else {
                return response()->json(['message' => 'Password does not match'], 400);
            }
        } else {
            return response()->json(['message' => 'Please register first'], 404);
        }
    }
 /**
     * @OA\Post(
     *     path="/api/customer/reg-form",
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
            'agree' => 'accepted',
        ]);

        $customer = new Customer([
            'authorize' => $request->authorize,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'business' => $request->business,
            'category' => $request->category,
            'permanent_state' => $request->permanent_state,
            'permanent_district' => $request->permanent_district,
            'permanent_municipality' => $request->permanent_municipality,
            'permanent_ward' => $request->permanent_ward,
            'permanent_tole' => $request->permanent_tole,
            'temporary_state' => $request->temporary_state,
            'temporary_district' => $request->temporary_district,
            'temporary_municipality' => $request->temporary_municipality,
            'temporary_ward' => $request->temporary_ward,
            'temporary_tole' => $request->temporary_tole,
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cell' => $request->cell,
            'password' => Hash::make($request->password),
            'cpassword' => Hash::make($request->cpassword),
            'agree' => $request->has('agree'),
        ]);

        if ($customer->save()) {
            return response()->json(['message' => 'Registration successful'], 201);
        } else {
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }
 /**
     * @OA\Get(
     *     path="/api/customerhome",
     *     summary="Get Customer Home",
     *     description="Returns the customer information if authenticated.",
     *     tags={"Customer"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Returns customer information",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="customer", type="object")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function customerhome(Request $request)
    {
        $customer = Auth::guard('sanctum')->user();

        if ($customer) {
            return response()->json(['customer' => $customer], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
