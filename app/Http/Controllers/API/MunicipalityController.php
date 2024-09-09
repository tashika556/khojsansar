<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Municipality API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Municipality",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="municipality_name", type="string", example="Shadananda Municipality"),
 *     @OA\Property(property="district_id", type="integer", example=1),
 *     example={"id": 1, "municipality_name": "Shadananda Municipality", "district_id": 1}
 * )
 */

class MunicipalityController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/municipalities",
     *     summary="Get list of municipalities",
     *     tags={"Municipalities"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Municipality"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $municipalities = DB::table('municipalities')->get();

            if ($municipalities->isEmpty()) {
                return $this->apiResponse(false, 'No municipalities found', [], [], false);
            }

            return $this->apiResponse(true, 'Municipalities fetched successfully', $municipalities);
        } catch (\Exception $e) {

            return $this->apiResponse(false, 'An error occurred while fetching municipalities', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getMunicipality",
     *     summary="Get list of municipalities by district ID",
     *     tags={"Municipalities"},
     *     @OA\Parameter(
     *         name="district_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Municipality"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getMunicipalitys(Request $request)
    {
        $districtId = $request->query('district_id');

        if (!$districtId) {
            return $this->apiResponse(false, 'District ID is required', [], [], false);
        }

        try {
            $municipalities = DB::table('municipalities')
                ->where('district_id', $districtId)
                ->get(['municipality_name', 'id']);

            if ($municipalities->isEmpty()) {
                return $this->apiResponse(false, 'No municipalities found for the given district ID', [], [], false);
            }

            return $this->apiResponse(true, 'Municipalities fetched successfully for the given district ID', $municipalities);
        } catch (\Exception $e) {

            return $this->apiResponse(false, 'An error occurred while fetching municipalities', [], ['error' => $e->getMessage()]);
        }
    }
}
