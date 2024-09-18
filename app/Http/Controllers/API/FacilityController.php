<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Facility API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Facility",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="facility_name", type="string", example="Wi-Fi"),
 *     @OA\Property(property="facility_logo", type="string", example="wifi.png"),
 *     example={"id": 1, "facility_name": "Wi-Fi", "facility_logo": "wifi.png"}
 * )
 */

class FacilityController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/facilities",
     *     summary="Get list of facilities",
     *     tags={"Facilities"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Facility"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $facilities = DB::table('facilities')->get();

            if ($facilities->isEmpty()) {
                return $this->apiResponse(false, 'No facilities found', [], [], false);
            }

            return $this->apiResponse(true, 'Facilities fetched successfully', $facilities);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching facilities', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getFacility",
     *     summary="Get facilities by restaurant ID",
     *     tags={"Facilities"},
     *     @OA\Parameter(
     *         name="restaurant_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Facility"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getFacilitys(Request $request)
    {
        $restaurantId = $request->query('restaurant_id');

        if (!$restaurantId) {
            return $this->apiResponse(false, 'Restaurant ID is required', [], [], false);
        }

        try {
            // Fetch facilities for the given restaurant
            $facilities = DB::table('facilities')
                ->join('business_facilities', 'facilities.id', '=', 'business_facilities.facility')
                ->join('businesses', 'business_facilities.business', '=', 'businesses.id')
                ->where('businesses.id', $restaurantId)
                ->get(['facilities.facility_name', 'facilities.facility_logo', 'facilities.id']);

            if ($facilities->isEmpty()) {
                return $this->apiResponse(false, 'No facilities found for the given Restaurant', [], [], false);
            }

            return $this->apiResponse(true, 'Facilities fetched successfully for the given Restaurant', $facilities);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching facilities', [], ['error' => $e->getMessage()]);
        }
    }
}
