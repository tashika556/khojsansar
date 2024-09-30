<?php

namespace App\Services;

use App\Models\Business;

class RestaurantService
{
    public static function getPopularRestaurants($limit = 5)
    {
        return Business::with('reviews')
            ->whereHas('reviews', function ($query) {
                $query->where('approved', 1);
            })
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take($limit)
            ->get();
    }
}
