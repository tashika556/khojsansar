<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;

/**
 * @OA\Info(title="Special Offer API", version="1.0")
 */

/**
 * @OA\Schema(
 *     schema="SpecialOffer",
 *     type="object",
 *     @OA\Property(property="restaurant_id", type="integer", example=1),
 *     @OA\Property(property="offer_img", type="string", example="dashain_offer.jpg"),
 *     @OA\Property(property="offer_name", type="string", example="Dashain Special Offer"),
 *     @OA\Property(property="offer_details", type="string", example="Get 50% off on selected items this Dashain!"),
 *     @OA\Property(property="valid_until", type="string", example="30-09-2024"),
 *     @OA\Property(property="municipality_id", type="integer", example=1)
 * )
 */
 class SpecialOfferController extends Controller
 {use ApiResponseTrait;
     // Dummy data for special offers
     protected $specialOffers = [
         [
             'restaurant_id' => 1,
             'offer_img' => 'dashain_offer.jpg',
             'offer_name' => 'Dashain Special Offer',
             'offer_details' => 'Get 50% off on selected items this Dashain!',
             'valid_until' => '30-09-2024',
             'municipality_id' => 1,
         ],
         [
             'restaurant_id' => 2,
             'offer_img' => 'tihar_offer.jpg',
             'offer_name' => 'Tihar Festive Offer',
             'offer_details' => 'Celebrate Tihar with 30% off on all meals!',
             'valid_until' => '10-11-2024',
             'municipality_id' => 2,
         ],
         [
             'restaurant_id' => 3,
             'offer_img' => 'bhaitika_offer.jpg',
             'offer_name' => 'Bhaitika Special Discount',
             'offer_details' => 'Special Bhaitika meal deals with 25% discount!',
             'valid_until' => '15-11-2024',
             'municipality_id' => 3,
         ],
         [
             'restaurant_id' => 1,
             'offer_img' => 'newyear_offer.jpg',
             'offer_name' => 'New Year Offer',
             'offer_details' => '20% off for New Year celebrations!',
             'valid_until' => '01-01-2025',
             'municipality_id' => 1,
         ]
     ];
  // 1. Display All Special Offers
    /**
     * @OA\Get(
     *     path="/api/special-offers/all",
     *     summary="Get all special offers with pagination",
     *     tags={"Special Offers"},
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer", default=1)
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer", default=10)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialOffer"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getAllSpecialOffers(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 10);

        $offersCollection = collect($this->specialOffers);
        $paginatedData = $offersCollection->forPage($page, $perPage)->values();

        if ($paginatedData->isEmpty()) {
            return $this->apiResponse(false, 'No special offers found', [], [], false);
        }

        return $this->apiResponse(true, 'Special offers fetched successfully', $paginatedData, [
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $offersCollection->count()
        ]);
    }

    // 2. Display Special Offers by Restaurant ID
    /**
     * @OA\Get(
     *     path="/api/special-offers/restaurant/{restaurant_id}",
     *     summary="Get special offers by restaurant ID",
     *     tags={"Special Offers"},
     *     @OA\Parameter(
     *         name="restaurant_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialOffer"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getOffersByRestaurant($restaurant_id)
    {
        $offersCollection = collect($this->specialOffers)->filter(function ($offer) use ($restaurant_id) {
            return $offer['restaurant_id'] == $restaurant_id;
        });

        if ($offersCollection->isEmpty()) {
            return $this->apiResponse(false, 'No special offers found for this restaurant', [], [], false);
        }

        return $this->apiResponse(true, 'Special offers for the restaurant fetched successfully', $offersCollection->values());
    }

    // 3. Display Special Offers by Municipality ID
    /**
     * @OA\Get(
     *     path="/api/special-offers/municipality/{municipality_id}",
     *     summary="Get special offers by municipality ID",
     *     tags={"Special Offers"},
     *     @OA\Parameter(
     *         name="municipality_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialOffer"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getOffersByMunicipality($municipality_id)
    {
        $offersCollection = collect($this->specialOffers)->filter(function ($offer) use ($municipality_id) {
            return $offer['municipality_id'] == $municipality_id;
        });

        if ($offersCollection->isEmpty()) {
            return $this->apiResponse(false, 'No special offers found for this municipality', [], [], false);
        }

        return $this->apiResponse(true, 'Special offers for the municipality fetched successfully', $offersCollection->values());
    }

    // 4. Display Special Offers by Restaurant ID and Municipality ID
    /**
     * @OA\Get(
     *     path="/api/special-offers/restaurant/{restaurant_id}/municipality/{municipality_id}",
     *     summary="Get special offers by restaurant ID and municipality ID",
     *     tags={"Special Offers"},
     *     @OA\Parameter(
     *         name="restaurant_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="municipality_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SpecialOffer"))
     *     ),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getOffersByRestaurantAndMunicipality($restaurant_id, $municipality_id)
    {
        $offersCollection = collect($this->specialOffers)->filter(function ($offer) use ($restaurant_id, $municipality_id) {
            return $offer['restaurant_id'] == $restaurant_id && $offer['municipality_id'] == $municipality_id;
        });

        if ($offersCollection->isEmpty()) {
            return $this->apiResponse(false, 'No special offers found for this restaurant and municipality', [], [], false);
        }

        return $this->apiResponse(true, 'Special offers for the restaurant and municipality fetched successfully', $offersCollection->values());
    }
}

