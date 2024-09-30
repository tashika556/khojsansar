<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
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
 
     try {
         $query = DB::table('businesses')
             ->leftJoin('customers', 'businesses.customer', '=', 'customers.id')
             ->leftJoin('categories', 'customers.category', '=', 'categories.id')
             ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id')
             ->select(
                 'businesses.id as restaurant_id',
                 'customers.business as name',
                 'categories.category_name as restaurant_category',
                 'businesses.logo',
                 'businesses.opening_total_hours',
                 'businesses.opening_total_days',
                 'businesses.address',
                 'businesses.municipality'
             );

         if ($municipalityId) {
             $query->where('businesses.municipality', $municipalityId);
         }
 
         if ($keyword) {
             $query->where(function($q) use ($keyword) {
                 $q->where('customers.business', 'like', '%' . $keyword . '%')
                   ->orWhere('categories.category_name', 'like', '%' . $keyword . '%');
             });
         }
 
         $businesses = $query
             ->groupBy(
                 'businesses.id',
                 'customers.business',
                 'categories.category_name',
                 'businesses.logo',
                 'businesses.opening_total_hours',
                 'businesses.opening_total_days',
                 'businesses.address',
                 'businesses.municipality'
             )
             ->paginate(10);
 
         if ($businesses->isEmpty()) {
             return $this->apiResponse(false, 'No restaurants found based on the provided search criteria.', [], [], false);
         }
 
         return $this->apiResponse(true, 'Restaurants fetched successfully', $businesses);
     } catch (\Exception $e) {
         return $this->apiResponse(false, 'Error fetching restaurants', [], ['error' => $e->getMessage()]);
     }
 }
    
}
