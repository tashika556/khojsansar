<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Category API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="category_name", type="string", example="Typical / Ethnic"),
 *     example={"id": 1, "category_name": "Typical / Ethnic"}
 * )
 */

class CategoryController extends Controller
{
    use ApiResponseTrait;

    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get list of categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Category"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        try {
            $categories = DB::table('categories')->get();

            if ($categories->isEmpty()) {
                return $this->apiResponse(false, 'No categories found', [], [], false);
            }

            return $this->apiResponse(true, 'Categories fetched successfully', $categories);
        } catch (\Exception $e) {

            return $this->apiResponse(false, 'An error occurred while fetching categories', [], ['error' => $e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/getCategory",
     *     summary="Get categories by Restaurant ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="restaurant_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Category"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getCategorys(Request $request)
    {
        $businessId = $request->query('restaurant_id');

        if (!$businessId) {
            return $this->apiResponse(false, 'Restaurant ID is required', [], [], false);
        }

        try {
       
            $categories = DB::table('categories')
                ->join('customers', 'categories.id', '=', 'customers.category')
                ->join('businesses', 'customers.id', '=', 'businesses.customer')
                ->where('businesses.id', $businessId)
                ->get(['categories.category_name', 'categories.id']);

            if ($categories->isEmpty()) {
                return $this->apiResponse(false, 'No categories found for the given Restaurant', [], [], false);
            }

            return $this->apiResponse(true, 'Categories fetched successfully for the given Restaurant', $categories);
        } catch (\Exception $e) {

            return $this->apiResponse(false, 'An error occurred while fetching categories', [], ['error' => $e->getMessage()]);
        }
    }
}
