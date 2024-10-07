<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\BusinessService;
use App\Models\BusinessFacility;
use App\Models\BusinessMenu;

use App\Traits\ApiResponseTrait;
/**
 * @OA\Info(title="Photos API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Photos",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Ani's Restaurant"),
 *     @OA\Property(property="coverimage", type="string", example="coverimage.jpg"),
 *     example={"id": 1, "name": "Ani's Restaurant", "restaurant_type": "Chinese Cuisine", "coverimage": "coverimage.jpg", "rating": 4.5, "review_count": 120}
 * )
 */

class PhotosController extends Controller
{ use ApiResponseTrait;
    /**
 * @OA\Get(
 *     path="/api/restaurantsphotos",
 *     summary="Get list of all restaurants with images in pagination",
 *     tags={"Restaurant Images Details"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Photos"))
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
public function restaurantsphotos()
{
    try {

        $businesses = DB::table('businesses')
            ->leftJoin('customers', 'businesses.customer', '=', 'customers.id')
            ->leftJoin('categories', 'customers.category', '=', 'categories.id')
            ->select(
                'businesses.id',
                'customers.business as name',
                'businesses.coverimage',

            )
            ->leftJoin('reviews', 'businesses.id', '=', 'reviews.business_id')
            ->groupBy('businesses.id', 'customers.business', 'categories.category_name', 'businesses.coverimage')
            ->paginate(10);

       
        $businesses->transform(function ($business) {


          
            $sliderImages = SliderPhotosVideos::where('business', $business->id)->pluck('photosvideos');


            $galleryImages = GalleryPhotosVideos::where('business', $business->id)->pluck('photosvideos');

     
            return (object) array_merge((array) $business, [
   
   
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
     *     path="/api/restaurantsphotos/{id}",
     *     summary="Get images for a specific restaurant by ID",
     *     tags={"Restaurant Images Details"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="object", 
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Ani's Restaurant"),
     *             @OA\Property(property="coverimage", type="string", example="coverimage.jpg"),
     *             @OA\Property(property="slider_images", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="gallery_images", type="array", @OA\Items(type="string"))
     *         )
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function restaurantPhotos($id)
    {
        try {
            $business = Business::select('businesses.id', 'customers.business as name', 'businesses.coverimage')
                ->leftJoin('customers', 'businesses.customer', '=', 'customers.id')
                ->where('businesses.id', $id)
                ->first();
    
            if (!$business) {
                return $this->apiResponse(false, 'Restaurant not found', [], [], false);
            }
    
        
            $sliderImages = SliderPhotosVideos::where('business', $business->id)
                ->paginate(10, ['*'], 'slider_page'); 
    

            $galleryImages = GalleryPhotosVideos::where('business', $business->id)
                ->paginate(10, ['*'], 'gallery_page');
    
            $business->slider_images = $sliderImages;
            $business->gallery_images = $galleryImages;
    
            return $this->apiResponse(true, 'Restaurant images fetched successfully', $business);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching restaurant images', [], ['error' => $e->getMessage()]);
        }
    }
    
}


