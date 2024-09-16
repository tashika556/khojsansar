<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Business API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Business",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="summary", type="string", example="Great restaurant with a variety of dishes."),
 *     @OA\Property(property="address", type="string", example="123 Main St."),
 *     @OA\Property(property="state", type="integer", example=1),
 *     @OA\Property(property="district", type="integer", example=1),
 *     @OA\Property(property="municipality", type="integer", example=1),
 *     @OA\Property(property="ward", type="string", example="Ward 4"),
 *     @OA\Property(property="tole", type="string", example="Tole 2"),
 *     @OA\Property(property="latitude", type="string", example="27.7172"),
 *     @OA\Property(property="longitude", type="string", example="85.3240"),
 *     example={"id": 1, "summary": "Great restaurant with a variety of dishes.", "address": "123 Main St.", "state": 1, "district": 1, "municipality": 1, "ward": "Ward 4", "tole": "Tole 2", "latitude": "27.7172", "longitude": "85.3240"}
 * )
 */

class BusinessController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/restaurants",
     *     summary="Get list of restaurants",
     *     tags={"Restaurants"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Business"))
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
     * @OA\Post(
     *     path="/api/getRestaurantByLocation",
     *     summary="Get list of restaurants by location with pagination",
     *     tags={"Restaurants"},
     * 
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
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Business"))
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
}
