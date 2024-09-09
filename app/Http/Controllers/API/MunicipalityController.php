<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     /**
      * @OA\Get(
      *     path="/api/municipalities",
      *     summary="Get list of Municipalities",
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
         $municipalities = DB::table('municipalities')->get();
         return response()->json($municipalities);
     }
 
 
 }
