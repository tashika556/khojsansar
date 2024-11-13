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
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantDetail"))
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
        $distance = 10; // Radius in kilometers

        $similarRestaurants = Business::selectRaw("
            businesses.id,
            businesses.customer,
            businesses.summary,
            businesses.address,
            businesses.state,
            businesses.district,
            businesses.municipality,
            businesses.ward,
            businesses.tole,
            businesses.latitude,
            businesses.longitude,
            businesses.website_url,
            businesses.phone_one,
            businesses.phone_two,
            businesses.email_one,
            businesses.email_two,
            businesses.logo,
            businesses.coverimage,
            businesses.openeveryday,
            customers.business as restaurant_name,
            categories.category_name as restaurant_type,
            AVG(reviews.rating) as rating, -- actual average rating
            COUNT(CASE WHEN reviews.approved = 1 AND reviews.rejected = 0 THEN reviews.id END) as review_count, -- count of approved reviews
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) 
            * cos(radians(longitude) - radians(?)) 
            + sin(radians(?)) * sin(radians(latitude)))) AS distance
        ", [$latitude, $longitude, $latitude])
        ->join('customers', 'customers.id', '=', 'businesses.customer')
        ->join('categories', 'customers.category', '=', 'categories.id')
        ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id')
        ->where('customers.category', $categoryId)
        ->groupBy(
            'businesses.id', 
            'businesses.customer', 
            'businesses.summary', 
            'businesses.address', 
            'businesses.state', 
            'businesses.district', 
            'businesses.municipality', 
            'businesses.ward', 
            'businesses.tole', 
            'businesses.latitude', 
            'businesses.longitude', 
            'businesses.website_url', 
            'businesses.phone_one', 
            'businesses.phone_two', 
            'businesses.email_one', 
            'businesses.email_two', 
            'businesses.logo', 
            'businesses.coverimage', 
            'businesses.openeveryday',
            'customers.business', 
            'categories.category_name'
        )
        ->having('distance', '<', $distance)
        ->orderBy('rating', 'DESC')
        ->orderBy('distance', 'ASC')
        ->get();


        foreach ($similarRestaurants as $restaurant) {
            $restaurant->rating = number_format($restaurant->rating, 1);
        }

        if ($similarRestaurants->isEmpty()) {
            return $this->apiResponse(false, 'No similar restaurants found', [], [], false);
        }

        return $this->apiResponse(true, 'Similar restaurants fetched successfully', $similarRestaurants);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching similar restaurants', [], ['error' => $e->getMessage()]);
    }
}


}
