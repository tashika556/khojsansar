<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Similar Restaurants API", version="1.0")
 */
/**
 * @OA\Schema(
 *     schema="RestaurantFilter",
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



class SimilarRestaurantsController extends Controller
{
    use ApiResponseTrait;

  /**
 * @OA\Get(
 *     path="/api/similar-restaurants",
 *     summary="Get similar restaurants by category and location",
 *     tags={"Similar Restaurants"},
 *     @OA\Parameter(
 *         name="category",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="latitude",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="number")
 *     ),
 *     @OA\Parameter(
 *         name="longitude",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="number")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantFilter"))
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */

 public function similarRestaurants(Request $request)
 {
     $latitude = $request->input('latitude');
     $longitude = $request->input('longitude');
     $categoryId = $request->input('category');
 
     if (is_null($latitude) || is_null($longitude) || is_null($categoryId)) {
         return $this->apiResponse(false, 'Latitude, Longitude, and Category are required', [], [], false);
     }
 
     try {

         $distance = 10; 
 
         $similarRestaurants = Business::select('businesses.id', 'customers.business as name', 'businesses.coverimage',
             DB::raw("(
                 6371 * acos(
                     cos(radians($latitude)) * cos(radians(businesses.latitude)) * 
                     cos(radians(businesses.longitude) - radians($longitude)) + 
                     sin(radians($latitude)) * sin(radians(businesses.latitude))
                 )
             ) AS distance"))
             ->join('customers', 'businesses.customer', '=', 'customers.id')
             ->where('customers.category', $categoryId)
             ->having('distance', '<', $distance)
             ->get();
 
   
         if ($similarRestaurants->isEmpty()) {
             return $this->apiResponse(false, 'No similar restaurants found', [], [], false);
         }
 
         return $this->apiResponse(true, 'Similar restaurants fetched successfully', $similarRestaurants);
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'An error occurred while fetching similar restaurants', [], ['error' => $e->getMessage()]);
     }
 }
 

}
