<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\MunicipalityController;
use App\Http\Controllers\API\ProvinceController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FacilityController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\AuthorizeController;

// API routes

Route::get('/districts', [DistrictController::class, 'index']);
Route::post('/getDistrict', [DistrictController::class, 'getDistricts']);

Route::post('/getMunicipality', [MunicipalityController::class, 'getMunicipalitys']);
Route::get('/municipalities', [MunicipalityController::class, 'index']);

Route::get('/provinces', [ProvinceController::class, 'index']);

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


