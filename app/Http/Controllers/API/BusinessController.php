<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinessFacility;
use App\Models\BusinessMenu;
use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;

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

        $businesses = DB::table('businesses')
            ->leftJoin('customers', 'businesses.customer', '=', 'customers.id')
            ->leftJoin('categories', 'customers.category', '=', 'categories.id')
            ->select(
                'businesses.id',
                'customers.business as name',
                'categories.category_name as restaurant_type',
                'businesses.coverimage',
                DB::raw('COALESCE(AVG(reviews.rating), 0) as rating'),
                DB::raw('COUNT(CASE WHEN reviews.approved = 1 AND reviews.rejected = 0 THEN reviews.id END) as review_count')
            )
            ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id')
            ->groupBy('businesses.id', 'customers.business', 'categories.category_name', 'businesses.coverimage')
            ->paginate(10);

        $businesses->transform(function ($business) {

            $offers = [
                '10% off on your first order',
                'Free dessert with orders over $30',
                'Happy hour: 5-7 PM for drinks'
            ];

            $services = BusinessService::where('business', $business->id)->with('service')->get();

            $facilities = BusinessFacility::where('business', $business->id)->with('facility')->get();

            $menus = BusinessMenu::where('business', $business->id)->with('menu')->get();

            $sliderImages = SliderPhotosVideos::where('business', $business->id)->pluck('photosvideos');

            $galleryImages = GalleryPhotosVideos::where('business', $business->id)->pluck('photosvideos');

            return (object) array_merge((array) $business, [
                'offers' => $offers,
                'services' => $services,
                'facilities' => $facilities,
                'menus' => $menus,
                'slider_images' => $sliderImages,
                'gallery_images' => $galleryImages
            ]);
        });

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
        // Fetch basic restaurant details
        $restaurant = DB::table('businesses')
            ->join('customers', 'businesses.customer', '=', 'customers.id')
            ->join('categories', 'customers.category', '=', 'categories.id')
            ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id') 
            ->where('businesses.id', $id)
            ->select(
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
                'businesses.opening_total_hours',
                'businesses.opening_total_days',
                'customers.business as name',   
                'categories.category_name as restaurant_type', 
                DB::raw('COALESCE(AVG(reviews.rating), 0) as rating'), 
                DB::raw('COUNT(CASE WHEN reviews.approved = 1 AND reviews.rejected = 0 THEN reviews.id END) as review_count') 
            )
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
                'businesses.opening_total_hours',
                'businesses.opening_total_days',
                'customers.business',
                'categories.category_name'
            ) 
            ->first();

        if (!$restaurant) {
            return $this->apiResponse(false, 'Restaurant not found', [], [], false);
        }

          $offers = [
            '10% off on your first order',
            'Free dessert with orders over $30',
            'Happy hour: 5-7 PM for drinks'
        ];
        $services = BusinessService::where('business', $id)->with('service')->get();
        $facilities = BusinessFacility::where('business', $id)->with('facility')->get();
        $menus = BusinessMenu::where('business', $id)->with('menu')->get();
        $sliderImages = SliderPhotosVideos::where('business', $id)->pluck('photosvideos');
        $galleryImages = GalleryPhotosVideos::where('business', $id)->pluck('photosvideos');


        $response = [
            'restaurant' => $restaurant,
            'offers' => $offers,
            'services' => $services,
            'facilities' => $facilities,
            'menus' => $menus,
            'slider_images' => $sliderImages,
            'gallery_images' => $galleryImages,
        ];

        return $this->apiResponse(true, 'Restaurant details fetched successfully', $response);
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
 *     @OA\Response(response=404, description="Not Found"),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=500, description="Internal Server Error")
 * )
 */
public function getRestaurantByLocation(Request $request)
{
    $municipality = $request->query('municipality');
    $page = $request->query('page', 1);
    $perPage = $request->query('per_page', 10);

    if (!$municipality) {
        return $this->apiResponse(false, 'Municipality is required', [], [], false);
    }

    try {
        $businesses = Business::selectRaw("
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
            businesses.opening_total_hours,
            businesses.opening_total_days,
            customers.business as restaurant_name,
            categories.category_name as restaurant_type,
            AVG(reviews.rating) as rating, -- actual average rating
            COUNT(CASE WHEN reviews.approved = 1 AND reviews.rejected = 0 THEN reviews.id END) as review_count -- count of approved reviews
        ")
        ->join('customers', 'customers.id', '=', 'businesses.customer')
        ->join('categories', 'customers.category', '=', 'categories.id')
        ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id') 
        ->where('businesses.municipality', $municipality)
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
                  'businesses.opening_total_hours', 
                  'businesses.opening_total_days',
                  'customers.business',
                  'categories.category_name')
        ->paginate($perPage, ['*'], 'page', $page);

        if ($businesses->isEmpty()) {
            return $this->apiResponse(false, 'No restaurants found in given municipality', [], [], false);
        }

        return $this->apiResponse(true, 'Restaurants fetched successfully for the given municipality', $businesses);
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
 *     @OA\Response(response=404, description="Not Found"),
 *     @OA\Response(response=400, description="Bad Request"),
 *     @OA\Response(response=500, description="Internal Server Error")
 * )
 */
public function getRestaurantsByLatLng(Request $request)
{
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $page = $request->query('page', 1);
    $perPage = $request->query('per_page', 10);
    
    if (!$latitude || !$longitude) {
        return $this->apiResponse(false, 'Latitude and Longitude are required', [], [], false);
    }

    try {
        $businesses = Business::selectRaw("
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
            businesses.opening_total_hours,
            businesses.opening_total_days,
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
        ->having('distance', '<', 50) 
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
                  'businesses.opening_total_hours',
                  'businesses.opening_total_days',
                  'customers.business',
                  'categories.category_name')
   
                 ->orderBy('distance', 'asc')
                ->paginate($perPage, ['*'], 'page', $page);

        if ($businesses->isEmpty()) {
            return $this->apiResponse(false, 'No restaurants found nearby', [], [], false);
        }

        return $this->apiResponse(true, 'Restaurants fetched successfully', $businesses);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching restaurants', [], ['error' => $e->getMessage()]);
    }
}



   /**
 * @OA\Get(
 *     path="/api/restaurantsrate",
 *     summary="Get list of restaurants sorted by rating",
 *     tags={"Restaurants Display as per rating"},
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
public function getRestaurantsrate(Request $request)
{
    $page = $request->query('page', 1);
    $perPage = $request->query('per_page', 10);
    $latitude = $request->query('latitude'); 
    $longitude = $request->query('longitude');

    try {
        $businesses = Business::selectRaw("
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
            businesses.opening_total_hours,
            businesses.opening_total_days,
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
                  'businesses.opening_total_hours', 
                  'businesses.opening_total_days', 
                  'customers.business', 
                  'categories.category_name')
        ->orderBy('rating', 'DESC')
        ->orderBy('distance', 'ASC')
        ->paginate($perPage, ['*'], 'page', $page);

        if ($businesses->isEmpty()) {
            return $this->apiResponse(false, 'No restaurants found', [], [], false);
        }

        return $this->apiResponse(true, 'Restaurants fetched successfully', $businesses);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching restaurants', [], ['error' => $e->getMessage()]);
    }
}
  
    
}    