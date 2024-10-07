<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="District API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="District",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="district_name", type="string", example="Bhojpur"),
 *     @OA\Property(property="province_id", type="integer", example=1),
 *     example={"id": 1, "district_name": "Koshi District", "province_id": 1}
 * )
 */

class DistrictController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/districts",
     *     summary="Get list of districts",
     *     tags={"Districts"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/District"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $districts = DB::table('districts')
  
            ->get(['district_name', 'id']);

            if ($districts->isEmpty()) {
                return $this->apiResponse(false, 'No districts found', [], [], false);
            }

            return $this->apiResponse(true, 'Districts fetched successfully', $districts);
        } catch (\Exception $e) {

            return $this->apiResponse(false, 'An error occurred while fetching districts', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getDistrict",
     *     summary="Get list of districts by province ID",
     *     tags={"Districts"},
     *     @OA\Parameter(
     *         name="province_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/District"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getDistricts(Request $request)
    {
        $provinceId = $request->query('province_id');

        if (!$provinceId) {
            return $this->apiResponse(false, 'Province ID is required', [], [], false);
        }

        try {
            $districts = DB::table('districts')
                ->where('province_id', $provinceId)
                ->get(['district_name', 'id']);

            if ($districts->isEmpty()) {
                return $this->apiResponse(false, 'No districts found for the given province ID', [], [], false);
            }

            return $this->apiResponse(true, 'Districts fetched successfully for the given province ID', $districts);
        } catch (\Exception $e) {
        
            return $this->apiResponse(false, 'An error occurred while fetching districts', [], ['error' => $e->getMessage()]);
        }
    }
}
