<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Restaurant API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="RestaurantDetail",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Ani's Restaurant"),
 *     @OA\Property(property="restaurant_type", type="string", example="Chinese Cuisine"),
 *     @OA\Property(property="coverimage", type="string", example="coverimage.jpg"),
 *     @OA\Property(property="rating", type="number", format="float", example=4.5),
 *     @OA\Property(property="review_count", type="integer", example=120),
 *     example={"id": 1, "name": "Ani's Restaurant", "restaurant_type": "Chinese Cuisine", "coverimage": "coverimage.jpg", "rating": 4.5, "review_count": 120}
 * )
 */




class BusinessController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/restaurants",
     *     summary="Get list of restaurants",
     *     tags={"Restaurant Details"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantDetail"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $businesses = DB::table('businesses')->paginate(10); 

            return $this->apiResponse(true, 'Restaurants fetched successfully', $businesses);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching restaurants', [], ['error' => $e->getMessage()]);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/restaurant/{id}",
     *     summary="Get restaurant details by ID",
     *     tags={"Restaurant Details"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/RestaurantDetail")
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getRestaurantDetail($id)
    {
        try {
    
            $dummyRating = 4.5;
            $dummyReviewCount = 120;

            $restaurant = DB::table('businesses')
                ->join('customers', 'businesses.customer', '=', 'customers.id')
                ->join('categories', 'customers.category', '=', 'categories.id')
                ->where('businesses.id', $id)
                ->select(
                    'businesses.id',
                    'customers.business as name',   
                    'categories.category_name as restaurant_type', 
                    'businesses.coverimage',
                    DB::raw("$dummyRating as rating"),
                    DB::raw("$dummyReviewCount as review_count")
                )
                ->first();

            if (!$restaurant) {
                return $this->apiResponse(false, 'Restaurant not found', [], [], false);
            }

            return $this->apiResponse(true, 'Restaurant details fetched successfully', $restaurant);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching restaurant details', [], ['error' => $e->getMessage()]);
        }
    }
/**
 * @OA\Post(
 *     path="/api/getRestaurantByMunicipalities",
 *     summary="Get list of restaurants by municipalities with pagination",
 *     tags={"Restaurants Detail By Location"},
 *     @OA\Parameter(
 *         name="municipality",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer", default=10)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantDetail"))
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
    public function getRestaurantByLocation(Request $request)
    {
    
        $municipality = $request->query('municipality');
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 10);

        if (!$municipality) {
            return $this->apiResponse(false, 'Municipality are required', [], [], false);
        }

        try {
            $businesses = DB::table('businesses')
        
                ->where('municipality', $municipality)
                ->paginate($perPage, ['*'], 'page', $page);

            return $this->apiResponse(true, 'Restaurants fetched successfully for the given location', $businesses);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching restaurants', [], ['error' => $e->getMessage()]);
        }
    }
    
 /**
     * @OA\Post(
     *     path="/api/getRestaurantsByLatLng",
     *     summary="Get restaurants by latitude and longitude",
     *     tags={"Restaurants Detail By Location"},
     *     @OA\Parameter(
     *         name="latitude",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         name="longitude",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantDetail"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getRestaurantsByLatLng(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        if (!$latitude || !$longitude) {
            return response()->json(['success' => false, 'message' => 'Latitude and Longitude are required'], 400);
        }

        try {
     
            $businesses = Business::selectRaw("
                businesses.*,
                customers.business as restaurant_name,
                4.5 as rating, -- dummy rating
                200 as review_count, -- dummy review count
                (6371 * acos(cos(radians(?)) * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) * sin(radians(latitude)))) AS distance
            ", [$latitude, $longitude, $latitude])
            ->join('customers', 'customers.id', '=', 'businesses.customer')
            ->having('distance', '<', 50) 
            ->orderBy('distance', 'asc')
            ->get();

            if ($businesses->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'No restaurants found nearby'], 404);
            }

            return response()->json(['success' => true, 'data' => $businesses], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }


}
