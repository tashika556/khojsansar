<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Business;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdateFetchController extends Controller
{

    use ApiResponseTrait;


/**
 * @OA\Get(
 *     path="/api/customerview/{id}",
 *     summary="Customer Details Display By It's ID",
 *     tags={"Customer Data Update/Fetch"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Customer ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",

 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */

 public function displaycustomer(Request $request, $id)
 {
     try {

         $customer = DB::table('customers')->where('id', $id)->first();
 
         if (!$customer) {
             return $this->apiResponse(false, 'Customer not found', [], 404);
         }
 
         return $this->apiResponse(true, 'Customer details fetched successfully', $customer, 200);
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'An error occurred while fetching customer details', [], ['error' => $e->getMessage()], 500);
     }
 }

  /**
 * @OA\Put(
 *     path="/api/customer/update/{id}",
 *     summary="Update Customer Information",
 *     tags={"Customer Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Customer ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"first_name", "last_name", "business", "category", "phone", "email", "address"},
 *             @OA\Property(property="authorize", type="integer", example=1),
 *             @OA\Property(property="first_name", type="string", example="John", default="Existing First Name"),
 *             @OA\Property(property="middle_name", type="string", example="Doe", default="Existing Middle Name"),
 *             @OA\Property(property="last_name", type="string", example="Smith", default="Existing Last Name"),
 *             @OA\Property(property="business", type="string", example=1, default="Existing Business"),
 *             @OA\Property(property="category", type="integer", example=2, default=2),
 *             @OA\Property(property="permanent_state", type="integer", example=1, default=1),
 *             @OA\Property(property="permanent_district", type="integer", example=5, default=5),
 *             @OA\Property(property="permanent_municipality", type="integer", example=12, default=12),
 *             @OA\Property(property="permanent_ward", type="integer", example=3, default=3),
 *             @OA\Property(property="permanent_tole", type="string", example="Park Street", default="Existing Tole"),
 *             @OA\Property(property="temporary_state", type="integer", example=2, default=2),
 *             @OA\Property(property="temporary_district", type="integer", example=8, default=8),
 *             @OA\Property(property="temporary_municipality", type="integer", example=15, default=15),
 *             @OA\Property(property="temporary_ward", type="integer", example=4, default=4),
 *             @OA\Property(property="temporary_tole", type="string", example="Main Avenue", default="Existing Tole"),
 *             @OA\Property(property="address", type="string", example="1234 Elm Street", default="Existing Address"),
 *             @OA\Property(property="phone", type="string", example="1234567890", default="Existing Phone Number"),
 *             @OA\Property(property="email", type="string", example="john@example.com", default="Existing Email"),
 *             @OA\Property(property="cell", type="string", example="0987654321", default="Existing Cell Number")
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

public function updateCustomer(Request $request, $id)
{
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
        'phone' => 'required|string|unique:customers,phone,' . $id,
        'email' => 'required|email|unique:customers,email,' . $id,
    ], $messages);

    if ($validator->fails()) {
        return $this->apiResponse(false, 'Validation Error', [
            'errors' => $validator->errors()
        ], 400);
    }

    try {
    
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

        $customer->save();

        return $this->apiResponse(true, 'Customer information has been updated successfully.', [], 200);
        
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'Internal Server Error', [], 500);
    }
}

/**
 * @OA\Get(
 *     path="/api/businessview/{id}",
 *     summary="Business Details Display By Customer ID",
 *     tags={"Business Data Update/Fetch"},
 *     @OA\Parameter(
 *         name="customer_id",
 *         in="query",
 *         required=true,
 *         description="Customer ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response"
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */


 public function displaybusiness(Request $request, $id)
 {
    $customerId = $request->query('customer_id');

    if (!$customerId) {
        return $this->apiResponse(false, 'Customer ID is required', [], [], false);
    }
     try {

         $business = DB::table('businesses')->where('businesses.customer', $customerId)->get();

         if ($business->isEmpty()) {
             return $this->apiResponse(false, 'Business not found for this customer ID', [], 404);
         }

         return $this->apiResponse(true, 'Business details fetched successfully', $business, 200);
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
 *     @OA\Parameter(
 *         name="customer_id",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(property="id", type="integer", example=1, description="Provide this field for update only"),
 *                 @OA\Property(property="summary", type="string", example="Business Summary"),
 *                 @OA\Property(property="email_one", type="string", example="business@example.com"),
 *                 @OA\Property(property="email_two", type="string", example="business2@example.com"),
 *                 @OA\Property(property="phone_one", type="string", example="1234567890"),
 *                 @OA\Property(property="phone_two", type="string", example="0987654321"),
 *                 @OA\Property(property="address", type="string", example="123 Business Ave"),
 *                 @OA\Property(property="website_url", type="string", example="https://businesswebsite.com"),
 *                 @OA\Property(property="state", type="integer", example=1),
 *                 @OA\Property(property="district", type="integer", example=2),
 *                 @OA\Property(property="municipality", type="integer", example=3),
 *                 @OA\Property(property="ward", type="integer", example=4),
 *                 @OA\Property(property="tole", type="string", example="Main Tole"),
 *                 @OA\Property(property="latitude", type="string", example="27.7172"),
 *                 @OA\Property(property="longitude", type="string", example="85.3240"),
 *                 @OA\Property(property="opening_total_days", type="integer", example=7, description="Total operating days"),
 *                 @OA\Property(property="opening_total_hours", type="string", example="9 AM to 9 PM", description="Total operating hours"),
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
 *                 @OA\Property(property="summary", type="string", example="Business Summary"),
 *                 @OA\Property(property="email_one", type="string", example="business@example.com"),
 *                 @OA\Property(property="email_two", type="string", example="business2@example.com"),
 *                 @OA\Property(property="phone_one", type="string", example="1234567890"),
 *                 @OA\Property(property="phone_two", type="string", example="0987654321"),
 *                 @OA\Property(property="address", type="string", example="123 Business Ave"),
 *                 @OA\Property(property="website_url", type="string", example="https://businesswebsite.com"),
 *                 @OA\Property(property="state", type="integer", example=1),
 *                 @OA\Property(property="district", type="integer", example=2),
 *                 @OA\Property(property="municipality", type="integer", example=3),
 *                 @OA\Property(property="ward", type="integer", example=4),
 *                 @OA\Property(property="tole", type="string", example="Main Tole"),
 *                 @OA\Property(property="latitude", type="string", example="27.7172"),
 *                 @OA\Property(property="longitude", type="string", example="85.3240"),
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
 *             @OA\Property(property="errors", type="object")
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
    $validator = Validator::make($request->all(), [
        'customer_id' => 'required|integer|exists:customers,id',
        'email_one' => 'required|email|unique:businesses,email_one,' . $request->id,
        'email_two' => 'nullable|email|unique:businesses,email_two,' . $request->id,
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
        return $this->apiResponse(false, 'Validation error', ['errors' => $validator->errors()], 400);
    }

    try {
        $business = Business::where('customer_id', $request->customer_id)->first();

        if (!$business) {
            return $this->apiResponse(true, 'No business data found, returning default values.', [
                'id' => "",
                'summary' => "",
                'email_one' => "",
                'email_two' => "",
                'phone_one' => "",
                'phone_two' => "",
                'address' => "",
                'website_url' => "",
                'state' => "",
                'district' => "",
                'municipality' => "",
                'ward' => "",
                'tole' => "",
                'latitude' => "",
                'longitude' => "",
                'logo' => "",
                'coverimage' => "",
                'opening_total_days' => "",
                'opening_total_hours' => "",
            ], 200);
        }

        $businessData = [];
        
  
        foreach (['summary', 'email_one', 'email_two', 'phone_one', 'phone_two', 'address', 'website_url', 'state', 'district', 'municipality', 'ward', 'tole', 'latitude', 'longitude', 'opening_total_days', 'opening_total_hours'] as $field) {
            if ($request->filled($field)) {
                $businessData[$field] = $request->$field;
            }
        }

        $business->update($businessData);

   
        if ($request->hasFile('logo')) {
            $business->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('coverimage')) {
            $business->coverimage = $request->file('coverimage')->store('coverimages', 'public');
        }

        $business->save();

        return $this->apiResponse(true, 'Business data updated successfully.', $business->toArray(), 200);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'Internal Server Error', [], 500);
    }
}

    
}