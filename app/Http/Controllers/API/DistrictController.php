<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $districts = DB::table('districts')->get();
        return response()->json($districts);
    }


}
