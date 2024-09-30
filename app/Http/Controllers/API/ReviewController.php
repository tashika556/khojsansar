<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;
/**
 * @OA\Info(title="Review API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="Review",
 *     type="object",
 *     properties={
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="name", type="string"),
 *         @OA\Property(property="email", type="string"),
 *         @OA\Property(property="review", type="string"),
 *         @OA\Property(property="rating", type="number", format="float"),
 *         @OA\Property(property="status", type="string", enum={"Pending", "Approved", "Rejected"})
 *     }
 * )
 */


class ReviewController extends Controller
{ use ApiResponseTrait;

/**
     * @OA\Get(
     *     path="/api/reviews",
     *     summary="Get paginated list of all reviews",
     *     tags={"Reviews"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Review"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index(Request $request)
    {
        try {
 
            $perPage = $request->query('per_page', 10); 
            $page = $request->query('page', 1); 


            $reviews = Review::paginate($perPage, ['*'], 'page', $page);

            return $this->apiResponse(true, 'Reviews fetched successfully', $reviews);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching reviews', [], ['error' => $e->getMessage()]);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/restaurant/{id}/reviews",
     *     summary="Get reviews for a as per restaurant id",
     *     tags={"Reviews"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Review"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getReviews($id)
    {
       
        try {
            // Fetch the restaurant with the given ID
            $business = Business::findOrFail($id);
            
            // Fetch the reviews for the restaurant
            $reviews = Review::where('business_id', $business->id)
                ->select('id', 'name', 'email', 'review', 'rating', 'approved', 'rejected')
                ->get();

            if ($reviews->isEmpty()) {
                return $this->apiResponse(false, 'No reviews found for this restaurant', [], [], false);
            }

         
            $reviews = $reviews->map(function ($review) {
                return [
                    'id' => $review->id,
                    'name' => $review->name,
                    'email' => $review->email,
                    'review' => $review->review,
                    'rating' => $review->rating,
                    'status' => $review->approved ? 'Approved' : ($review->rejected ? 'Rejected' : 'Pending'),
                ];
            });

            return $this->apiResponse(true, 'Reviews fetched successfully', $reviews);
        } catch (\Exception $e) {
            return $this->apiResponse(false, 'An error occurred while fetching reviews', [], ['error' => $e->getMessage()]);
        }
    }
}
