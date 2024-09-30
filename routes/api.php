<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\MunicipalityController;
use App\Http\Controllers\API\ProvinceController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FacilityController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\SpecialController;
use App\Http\Controllers\API\SpecialOfferController;
use App\Http\Controllers\API\AuthorizeController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\PhotosController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\SimilarRestaurantsController;
use App\Http\Controllers\API\RestaurantSearchController;
use App\Http\Controllers\API\UpdateFetchController;

// API routes
Route::post('/getCategory', [CategoryController::class, 'getCategorys']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/getCategorym', [CategoryController::class, 'getCategories']);


Route::post('/customer/login', [CustomerController::class, 'login']);

Route::post('/customer/register', [CustomerController::class, 'apiSignup']);

Route::get('/customerview/{id}', [UpdateFetchController::class, 'displaycustomer']);
Route::put('/customer/update/{id}', [UpdateFetchController::class, 'updateCustomer']);

Route::get('/businessview/{id}', [UpdateFetchController::class, 'displaybusiness']);

Route::post('/customer/updatestorebusiness', [UpdateFetchController::class, 'storeOrUpdateBusiness']);

Route::post('/customer/forget-password', [CustomerController::class, 'apiSendResetCode'])->name('api.customer.send-reset-code');
Route::post('/customer/reset-password', [CustomerController::class, 'apiResetPassword'])->name('api.customer.reset-password');


Route::post('/getFacility', [FacilityController::class, 'getFacilitys']);
Route::get('/facilities', [FacilityController::class, 'index']);


Route::post('/getService', [ServiceController::class, 'getServices']);
Route::get('/services', [ServiceController::class, 'index']);


Route::post('/getSpecialfood', [SpecialController::class, 'getSpecialfoods']);
Route::get('/specialfoods', [SpecialController::class, 'index']);

Route::get('/districts', [DistrictController::class, 'index']);
Route::post('/getDistrict', [DistrictController::class, 'getDistricts']);

Route::post('/getMunicipality', [MunicipalityController::class, 'getMunicipalitys']);
Route::get('/municipalities', [MunicipalityController::class, 'index']);



Route::get('/restaurants', [BusinessController::class, 'index']);
Route::post('/getRestaurantByMunicipalities', [BusinessController::class, 'getRestaurantByLocation']);
Route::post('/getRestaurantsByLatLng', [BusinessController::class, 'getRestaurantsByLatLng']);
Route::get('/restaurantsrate', [BusinessController::class, 'getRestaurantsrate']);


Route::get('/restaurantsphotos', [PhotosController::class, 'restaurantsphotos']);
Route::get('/restaurantsphotos/{id}', [PhotosController::class, 'restaurantPhotos']);

Route::get('/similar-restaurants', [SimilarRestaurantsController::class, 'similarRestaurants']);


Route::get('/restaurantssearch', [RestaurantSearchController::class, 'searchRestaurants']);


Route::get('restaurant/{id}/reviews', [ReviewController::class, 'getReviews']);
Route::get('reviews', [ReviewController::class, 'index']);

Route::get('/banners', [BannerController::class, 'getBanners']);
Route::get('/getBannersbyRestaurant/{restaurant_id}', [BannerController::class, 'getBannersbyRestaurant']);

Route::get('/special-offers/all', [SpecialOfferController::class, 'getAllSpecialOffers']);
Route::get('/special-offers/restaurant/{restaurant_id}', [SpecialOfferController::class, 'getOffersByRestaurant']);
Route::get('/special-offers/municipality/{municipality_id}', [SpecialOfferController::class, 'getOffersByMunicipality']);
Route::get('/special-offers/restaurant/{restaurant_id}/municipality/{municipality_id}', [SpecialOfferController::class, 'getOffersByRestaurantAndMunicipality']);


Route::get('/provinces', [ProvinceController::class, 'index']);

Route::get('/restaurant/{id}', [BusinessController::class, 'getRestaurantDetail']);
//admin routes


// Customer routes
Route::group(['prefix' => 'customer'], function () {
    Route::get('/customerlogin', [CustomerController::class, 'login']);
    Route::get('/customersignup', [CustomerController::class, 'signup']);
    Route::post('/reg-form', [CustomerController::class, 'signupform']);
    Route::post('/login-form', [CustomerController::class, 'loginform']);  
    Route::get('/home', [CustomerController::class, 'customerhome']);
    Route::get('/termscondition', [CustomerController::class, 'termscond']);
});


