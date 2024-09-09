<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @OA\Info(title="Province API", version="1.0")
 */
/**
 * @OA\Schema(
 *     schema="Province",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="province_name", type="string", example="Koshi Pradesh"),
 *     example={"id": 1, "province_name": "Koshi Pradesh"}
 * )
 */

class ProvinceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/provinces",
     *     summary="Get list of provinces",
     *     tags={"Provinces"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Province"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        $provinces = DB::table('provinces')->get();
        return response()->json($provinces);
    }
}