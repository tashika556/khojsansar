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

// API routes
Route::post('/getCategory', [CategoryController::class, 'getCategorys']);
Route::get('/categories', [CategoryController::class, 'index']);


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

Route::get('/banners', [BannerController::class, 'getBanners']);
Route::get('/getBannersbyRestaurant/{restaurant_id}', [BannerController::class, 'getBannersbyRestaurant']);

Route::get('/special-offers/all', [SpecialOfferController::class, 'getAllSpecialOffers']);
Route::get('/special-offers/restaurant/{restaurant_id}', [SpecialOfferController::class, 'getOffersByRestaurant']);
Route::get('/special-offers/municipality/{municipality_id}', [SpecialOfferController::class, 'getOffersByMunicipality']);
Route::get('/special-offers/restaurant/{restaurant_id}/municipality/{municipality_id}', [SpecialOfferController::class, 'getOffersByRestaurantAndMunicipality']);


Route::get('/provinces', [ProvinceController::class, 'index']);

Route::get('/restaurant/{id}', [BusinessController::class, 'getRestaurantDetail']);
//admin routes

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    Route::resource('/category', CategoryController::class)->except(['create', 'edit']);
    Route::resource('/facility', FacilityController::class)->except(['create', 'edit']);
    Route::resource('/service', ServiceController::class)->except(['create', 'edit']);
    Route::resource('/province', ProvinceController::class)->except(['create', 'edit']);
    Route::resource('/district', DistrictController::class)->except(['create', 'edit']);
    Route::resource('/municipality', MunicipalityController::class)->except(['create', 'edit']);
    Route::resource('/authorize', AuthorizeController::class)->except(['create', 'edit']);

    Route::get('/pendingcustomer', [AdminController::class, 'pendingcustomers']);
    Route::get('/viewpendingcustomer/{id}', [AdminController::class, 'viewpendingcustomers']);
    Route::post('/pendingcustomer/{id}/verify', [AdminController::class, 'verifypendingCustomer']);
    Route::post('/pendingcustomer/{id}/reject', [AdminController::class, 'rejectpendingCustomer']);
    Route::delete('/customer/{id}', [AdminController::class, 'destroycustomer']);

    Route::get('/verifiedcustomer', [AdminController::class, 'verifiedcustomers']);
    Route::get('/viewverifiedcustomer/{id}', [AdminController::class, 'viewverifiedcustomers']);
    Route::get('/rejectedcustomer', [AdminController::class, 'rejectedcustomers']);
    Route::get('/viewrejectedcustomer/{id}', [AdminController::class, 'viewrejectedcustomers']);
});

// Customer routes
Route::group(['prefix' => 'customer'], function () {
    Route::get('/customerlogin', [CustomerController::class, 'login']);
    Route::get('/customersignup', [CustomerController::class, 'signup']);
    Route::post('/reg-form', [CustomerController::class, 'signupform']);
    Route::post('/login-form', [CustomerController::class, 'loginform']);  
    Route::get('/home', [CustomerController::class, 'customerhome']);
    Route::get('/termscondition', [CustomerController::class, 'termscond']);
});


