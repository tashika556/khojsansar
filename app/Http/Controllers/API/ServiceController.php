<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Service API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Service",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="service_name", type="string", example="Buffet Service"),
 *     @OA\Property(property="service_logo", type="string", example="buffet.png"),
 *     example={"id": 1, "service_name": "Buffet Service", "service_logo": "buffet.png"}
 * )
 */

class ServiceController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/services",
     *     summary="Get list of Services",
     *     tags={"Services"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Service"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $services = DB::table('services')->get();

            if ($services->isEmpty()) {
                return $this->apiResponse(false, 'No services found', [], [], false);
            }

            return $this->apiResponse(true, 'services fetched successfully', $services);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching services', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getService",
     *     summary="Get services by restaurant ID",
     *     tags={"Services"},
     *     @OA\Parameter(
     *         name="restaurant_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Service"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getServices(Request $request)
    {
        $restaurantId = $request->query('restaurant_id');

        if (!$restaurantId) {
            return $this->apiResponse(false, 'Restaurant ID is required', [], [], false);
        }

        try {
            // Fetch services for the given restaurant
            $services = DB::table('services')
                ->join('business_services', 'services.id', '=', 'business_services.service')
                ->join('businesses', 'business_services.business', '=', 'businesses.id')
                ->where('businesses.id', $restaurantId)
                ->get(['services.service_name', 'services.service_logo', 'services.id']);

            if ($services->isEmpty()) {
                return $this->apiResponse(false, 'No services found for the given Restaurant', [], [], false);
            }

            return $this->apiResponse(true, 'services fetched successfully for the given Restaurant', $services);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching services', [], ['error' => $e->getMessage()]);
        }
    }
}
