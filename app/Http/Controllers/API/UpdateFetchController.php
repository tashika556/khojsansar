<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\BusinessMenu;
use App\Models\MenuPdf;
use App\Models\Business;
use App\Models\BusinessService;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Session;

class UpdateFetchController extends Controller
{

    use ApiResponseTrait;

 

/**
 * @OA\Get(
 *     path="/api/business/{customerId}/services",
 *     summary="Get services of a given business",
 *     tags={"Service Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business services fetched successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="business", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="summary", type="string", example="Business summary goes here."),
 *                
 *             ),
 *             @OA\Property(property="services", type="array",
 *                 @OA\Items(type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Service Name")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Business not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Business not found.")
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

 public function getBusinessServices($customerId)
 {
     try {

         $business = Business::where('customer', $customerId)->first();

         if (!$business) {
             return $this->apiResponse(false, 'Business not found on given customer', [], [], 404);
         }

         $services = $business->services()->get();
 
         return $this->apiResponse(true, 'Services of given Business with respective customer fetched successfully', [

             'services' => $services
         ], 200);
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'An error occurred while fetching business services', [], ['error' => $e->getMessage()], 500);
     }
 }
 
 /**
 * @OA\Post(
 *     path="/api/business/{customerId}/services",
 *     summary="Update services for a given business",
 *     tags={"Service Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="services", type="array", @OA\Items(type="integer")),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business services updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Services updated successfully!"),
 *             @OA\Property(property="business", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *        
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
 *                 @OA\Property(property="services", type="array", @OA\Items(type="string", example="The selected service does not exist."))
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

public function updateBusinessServices(Request $request, $customerId)
{
    try {
     
        $request->validate([
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $business = Business::where('customer', $customerId)->first();
        if (!$business) {
            return $this->apiResponse(false, 'Business not found', [], [], 404);
        }
        $business->services()->sync($request->input('services'));

        $businessWithServices = $business->load('services');

        return $this->apiResponse(true, 'Services updated successfully of respective business!', $businessWithServices, 200);
    } catch (\Exception $e) {

        return $this->apiResponse(false, 'An error occurred while updating services', [], ['error' => $e->getMessage()], 500);
    }
}

/**
 * @OA\Get(
 *     path="/api/business/{customerId}/facilities",
 *     summary="Get Facilities of a given business",
 *     tags={"Facilities Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business facilities fetched successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="business", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="summary", type="string", example="Business summary goes here."),
 *                
 *             ),
 *             @OA\Property(property="facilities", type="array",
 *                 @OA\Items(type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Facility Name")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Business not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Business not found.")
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

 public function getBusinessFacilities($customerId)
 {
     try {

         $business = Business::where('customer', $customerId)->first();

         if (!$business) {
             return $this->apiResponse(false, 'Business not found on given customer', [], [], 404);
         }

         $facilities = $business->facilities()->get();
 
         return $this->apiResponse(true, 'Facilities of given Business with respective customer fetched successfully', [

             'facilities' => $facilities
         ], 200);
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'An error occurred while fetching business facilities', [], ['error' => $e->getMessage()], 500);
     }
 }
 
 /**
 * @OA\Post(
 *     path="/api/business/{customerId}/facilities",
 *     summary="Update facilities for a given business",
 *     tags={"Facilities Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="facilities", type="array", @OA\Items(type="integer")),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business Facilities updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Facilities updated successfully!"),
 *             @OA\Property(property="business", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *        
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
 *                 @OA\Property(property="facilities", type="array", @OA\Items(type="string", example="The selected faciliy does not exist."))
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
public function updateBusinessFacilities(Request $request, $customerId)
{
    try {
     
        $request->validate([
            'facilities' => 'required|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $business = Business::where('customer', $customerId)->first();

        if (!$business) {
            return $this->apiResponse(false, 'Business not found', [], [], 404);
        }

        $business->facilities()->sync($request->input('facilities'));

        $businessWithFacilities = $business->load('facilities');

        return $this->apiResponse(true, 'Facilities updated successfully for the respective business!', $businessWithFacilities, 200);
    } catch (\Exception $e) {

        return $this->apiResponse(false, 'An error occurred while updating facilities', [], ['error' => $e->getMessage()], 500);
    }
}
/**
 * @OA\Get(
 *     path="/api/business/{customerId}/menus",
 *     summary="Fetch all menus for a given business including PDF",
 *     tags={"Business Menus Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Business Menus fetched successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Menus fetched successfully!"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="menuTopics", type="array",
 *                     @OA\Items(type="object",
 *                         @OA\Property(property="id", type="integer", example=1),
 *                         @OA\Property(property="menu_topic", type="string", example="Appetizers"),
 *                         @OA\Property(property="menuItems", type="array", 
 *                             @OA\Items(type="object",
 *                                 @OA\Property(property="id", type="integer", example=1),
 *                                 @OA\Property(property="title", type="string", example="Spring Rolls"),
 *                                 @OA\Property(property="price", type="string", example="5.99"),
 *                                 @OA\Property(property="caption", type="string", example="Delicious rolls"),
 *                                 @OA\Property(property="photo", type="string", example="path/to/photo.jpg")
 *                             )
 *                         )
 *                     )
 *                 ),
 *                 @OA\Property(property="menuPDF", type="string", example="path/to/pdf.pdf")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Business not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Business not found!")
 *         )
 *     )
 * )
 */
public function fetchBusinessMenus($customerId)
{
    $business = Business::where('customer', $customerId)->firstOrFail();
    
    // Fetch menu topics that have menu items
    $menuTopics = Menu::with(['menuItems' => function ($query) use ($business) {
        $query->where('business', $business->id);
    }])
    ->whereHas('menuItems', function ($query) use ($business) {
        $query->where('business', $business->id);
    })
    ->get();
    
    // Fetch the PDF associated with the business
    $menuPDF = MenuPdf::where('business', $business->id)->value('pdf');

    return $this->apiResponse(true, 'Menus fetched successfully!', ['menuTopics' => $menuTopics, 'menuPDF' => $menuPDF], 200);
}
/**
 * @OA\Post(
 *     path="/api/business/{customerId}/menus",
 *     summary="Store or update menu items and PDF for a given business",
 *     tags={"Business Menus Data Update/Fetch"},
 *     security={{"BearerAuth":{}}},
 *     @OA\Parameter(
 *         name="customerId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID of the customer"
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="menu_items",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(property="menu_topic", type="integer", description="ID of the menu topic"),
 *                         @OA\Property(
 *                             property="items",
 *                             type="array",
 *                             @OA\Items(
 *                                 @OA\Property(property="title", type="string", description="Menu item title"),
 *                                 @OA\Property(property="price", type="string", description="Menu item price"),
 *                                 @OA\Property(property="caption", type="string", description="Menu item caption"),
 *                             )
 *                         )
 *                     )
 *                 ),
 *                 @OA\Property(property="pdf", type="string", format="binary", description="Upload PDF file")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Menu items and PDF added/updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Menu items and PDF added/updated successfully!"),
 *             @OA\Property(property="data", type="null")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Business not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Business not found!")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation errors",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Validation errors occurred."),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     )
 * )
 */
public function storemenus(Request $request, $customerId)
{
    // Custom messages for validation
    $messages = [
        'required' => 'The :attribute field is required. Please provide a value.',
        'pdf.mimes' => 'File must be of the following file type: pdf.',
    ];

    // Check if menu_items is a JSON string and decode it
    if ($request->has('menu_items') && is_string($request->menu_items)) {
        $request->merge(['menu_items' => json_decode($request->menu_items, true)]);
    }

    // Validate the request
    $validator = \Validator::make($request->all(), [
        'menu_items' => 'sometimes|array',
        'menu_items.*.menu_topic' => 'sometimes|required|integer',
        'menu_items.*.items' => 'sometimes|required|array',
        'menu_items.*.items.*.title' => 'sometimes|required|string|max:255',
        'menu_items.*.items.*.price' => 'sometimes|required|string|max:255',
        'menu_items.*.items.*.caption' => 'nullable|string',
        'pdf' => 'nullable|mimes:pdf|max:10000',
    ], $messages);

    // Return validation errors if validation fails
    if ($validator->fails()) {
        \Log::info('Validation errors occurred:', $validator->errors()->toArray());
        return $this->apiResponse(false, 'Validation errors occurred.', null, 422, $validator->errors());
    }

    // Check if the business exists
    $business = Business::where('customer', $customerId)->first();
    if (!$business) {
        \Log::info('Business not found for customer ID:', ['customer_id' => $customerId]);
        return $this->apiResponse(false, 'Business not found!', null, 404);
    }

    // Store or update menu items
    if (isset($request->menu_items) && is_array($request->menu_items)) {
        foreach ($request->menu_items as $menuData) {
            // Check if 'menu_topic' exists before accessing it
            if (isset($menuData['menu_topic'])) {
                $menuTopicId = $menuData['menu_topic'];

                // Check if 'items' exists and is an array
                if (isset($menuData['items']) && is_array($menuData['items'])) {
                    foreach ($menuData['items'] as $item) {
                        if (isset($item['title']) && isset($item['price'])) {
                            $menuItemData = [
                                'menu_topic' => $menuTopicId,
                                'business' => $business->id,
                                'title' => $item['title'],
                                'price' => $item['price'],
                                'caption' => $item['caption'] ?? null,
                            ];

                            try {
                                BusinessMenu::updateOrCreate(
                                    [
                                        'business' => $business->id,
                                        'menu_topic' => $menuTopicId,
                                        'title' => $item['title'],
                                    ],
                                    $menuItemData
                                );
                                \Log::info('Menu item saved/updated:', ['data' => $menuItemData]);
                            } catch (\Exception $e) {
                                \Log::error('Error saving menu item:', ['error' => $e->getMessage(), 'data' => $menuItemData]);
                            }
                        } else {
                            \Log::warning('Item title or price missing', ['item' => $item]);
                        }
                    }
                } else {
                    \Log::warning('Items array is missing or not an array', ['menuData' => $menuData]);
                }
            } else {
                \Log::warning('Menu topic is missing', ['menuData' => $menuData]);
            }
        }
    } else {
        \Log::warning('Menu items are missing or not an array', ['request' => $request->all()]);
    }

    // Handle PDF upload
    if ($request->hasFile('pdf')) {
        $pdfPath = $request->file('pdf')->store('menu_pdfs', 'public');
        \Log::info('PDF uploaded to: ' . $pdfPath);

        $existingPdf = MenuPdf::where('business', $business->id)->first();

        if ($existingPdf) {
            $existingPdf->update(['pdf' => $pdfPath]);
            \Log::info('PDF updated:', ['business_id' => $business->id, 'pdf_path' => $pdfPath]);
        } else {
            MenuPdf::create(['pdf' => $pdfPath, 'business' => $business->id]);
            \Log::info('PDF created:', ['business_id' => $business->id, 'pdf_path' => $pdfPath]);
        }
    }

    \Log::info('Menu items processing complete for business:', ['business_id' => $business->id]);
    return $this->apiResponse(true, 'Menu items and PDF added/updated successfully!', null, 200);
}


}