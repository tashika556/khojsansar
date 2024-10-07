<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Banner API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Banner",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="restaurant_id", type="integer", example=1),
 *     @OA\Property(property="coverimage", type="string", example="coverimage.jpg"),
 *     example={"id": 1, "restaurant_id" : 1, "coverimage": "coverimage.jpg"}
 * )
 */

class BannerController extends Controller
{
    use ApiResponseTrait;

   /**
 * @OA\Get(
 *     path="/api/banners",
 *     summary="Get list of restaurant banners with pagination",
 *     tags={"Banners"},
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
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Banner"))
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
public function getBanners(Request $request)
{
    $page = $request->query('page', 1);
    $perPage = $request->query('per_page', 10);

    try {
        $banners = DB::table('businesses')
            ->select('id as restaurant_id', 'coverimage')
            ->whereNotNull('coverimage') 
            ->where('coverimage', '!=', '') 
            ->paginate($perPage, ['*'], 'page', $page);

        return $this->apiResponse(true, 'Banners fetched successfully', $banners);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching banners', [], ['error' => $e->getMessage()]);
    }
}


/**
 * @OA\Get(
 *     path="/api/getBannersbyRestaurant/{restaurant_id}",
 *     summary="Get banners by restaurant ID",
 *     tags={"Banners"},
 *     @OA\Parameter(
 *         name="restaurant_id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Banner"))
 *     ),
 *     @OA\Response(response=404, description="Not Found")
 * )
 */
public function getBannersbyRestaurant(Request $request, $restaurant_id)
{
    try {
        $banners = DB::table('businesses')
            ->select('id as restaurant_id', 'coverimage')
            ->where('id', $restaurant_id)
            ->whereNotNull('coverimage') 
            ->where('coverimage', '!=', '') 
            ->get();

        if ($banners->isEmpty()) {
            return $this->apiResponse(false, 'No banners found for the given restaurant', [], [], false);
        }

        return $this->apiResponse(true, 'Banners fetched successfully for the given restaurant', $banners);
    } catch (\Exception $e) {
        return $this->apiResponse(false, 'An error occurred while fetching banners', [], ['error' => $e->getMessage()]);
    }
}

}
