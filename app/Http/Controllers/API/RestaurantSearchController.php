<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinessFacility;
use App\Models\BusinessMenu;
use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Restaurants Search API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="RestaurantSearchResult",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Ani's Restaurant"),
 *     @OA\Property(property="address", type="string", example="Main Street"),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(property="municipality_id", type="integer", example=5),
 *     @OA\Property(property="phone", type="string", example="123-456-7890"),
 *     @OA\Property(property="featuredSpecial", type="string", example="Special Dish"),
 * )
 */

class RestaurantSearchController extends Controller
{
    use ApiResponseTrait;

/**
 * @OA\Get(
 *     path="/api/restaurantssearch",
 *     summary="Get list of restaurants by search filters through keyword[name and category] and municipality",
 *     tags={"Restaurants Search"},
 *     @OA\Parameter(
 *         name="keyword",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="municipality_id",
 *         in="query",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),

 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RestaurantSearchResult"))
 *     ),
 *     @OA\Response(response=404, description="Not Found"),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=500, description="Internal Server Error")
 * )
 */

 public function searchRestaurants(Request $request)
 {
     $keyword = $request->input('keyword');
     $municipalityId = $request->input('municipality_id');
     $latitude = $request->query('latitude');
     $longitude = $request->query('longitude');
 
     try {
   
         $query = Business::selectRaw("
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
         ->groupBy('businesses.id',
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
             'categories.category_name')
         ->orderBy('rating', 'DESC')
         ->orderBy('distance', 'ASC');
 
         if ($municipalityId) {
             $query->where('businesses.municipality', $municipalityId);
         }
 
         if ($keyword) {
             $query->where(function($q) use ($keyword) {
                 $q->where('customers.business', 'like', '%' . $keyword . '%')
                   ->orWhere('categories.category_name', 'like', '%' . $keyword . '%');
             });
         }
 
         $businesses = $query->paginate(10);
 
         foreach ($businesses as $business) {
             $business->rating = number_format($business->rating, 1);
         }
 
         if ($businesses->isEmpty()) {
           
             return $this->apiResponse(true, 'No restaurants found based on the provided search criteria.', (object)[], [], false);
         }
 
         return $this->apiResponse(true, 'Restaurants fetched successfully', $businesses);
 
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'Error fetching restaurants', [], ['error' => $e->getMessage()]);
     }
 }
 
 
    
}
