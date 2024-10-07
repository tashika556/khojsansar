<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Special Food API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="SpecialFood",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="special_name", type="string", example="Kothey Momo"),
 *     @OA\Property(property="short_detail", type="string", example="Delicious, yummy with 4 different pickles."),
 *     @OA\Property(property="price", type="string", example="Rs.200"),
 *     @OA\Property(property="photo", type="string", example="food.png"),
 *     example={"id": 1, "special_name": "Kothey Momo", "short_detail": "Delicious, yummy with 4 different pickles.", "price": "Rs.200", "photo": "food.png"}
 * )
 */

class SpecialController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/specialfoods",
     *     summary="Get list of special foods",
     *     tags={"Special Foods"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialFood"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $specialFoods = DB::table('specials')->get(['id','special_name', 'short_detail', 'price', 'photo']);

            if ($specialFoods->isEmpty()) {
                return $this->apiResponse(false, 'No special foods found', [], [], false);
            }

            return $this->apiResponse(true, 'Special foods fetched successfully', $specialFoods);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching special foods', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getSpecialfood",
     *     summary="Get special foods by business ID",
     *     tags={"Special Foods"},
     *     @OA\Parameter(
     *         name="business_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialFood"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getSpecialfoods(Request $request)
    {
        $businessId = $request->query('business_id');

        if (!$businessId) {
            return $this->apiResponse(false, 'Business ID is required', [], [], false);
        }

        try {
            $specialFoods = DB::table('specials')
                ->where('business', $businessId)
                ->get(['special_name', 'short_detail', 'price', 'photo', 'id']);

            if ($specialFoods->isEmpty()) {
                return $this->apiResponse(false, 'No special foods found for the given business ID', [], [], false);
            }

            return $this->apiResponse(true, 'Special foods fetched successfully for the given business ID', $specialFoods);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching special foods', [], ['error' => $e->getMessage()]);
        }
    }
}
