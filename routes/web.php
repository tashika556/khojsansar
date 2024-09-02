<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ServiceController;

//view
Route::get('/', function () {
    return view('frontend/index');
});

//province district municipality view

Route::post('/getDistrict', [DistrictController::class,'getDistricts']);
Route::post('/getMunicipality', [MunicipalityController::class,'getMunicipalitys']);


//admin


Route::get('/digisoft',[AdminController::class,'display'])->name('adminlogin');
Route::post('authadmin',[AdminController::class,'authadmin'])->name('authadmin');

Route::group(['middleware' => 'adminauth'], function () {
    Route::get('admin/logout',[AdminController::class,'adminlogout']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard'); 


    Route::get('/admin/category', [CategoryController::class, 'category'])->name('category'); 
    Route::get('/admin/createcategory', [CategoryController::class, 'createcategory'])->name('createcategory'); 
    Route::post('/category-form', [CategoryController::class, 'store'])->name('storecategory'); 
    Route::get('/admin/editcategory/{id}', [CategoryController::class, 'editcategory'])->name('editcategory'); 
    Route::put('/category-updateform/{id}', [CategoryController::class, 'update'])->name('updatecategory'); 
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::get('/admin/facility', [FacilityController::class, 'facility'])->name('facility'); 
    Route::get('/admin/createfacility', [FacilityController::class, 'createfacility'])->name('createfacility'); 
    Route::post('/facility-form', [FacilityController::class, 'store'])->name('store'); 
    Route::get('/admin/editfacility/{id}', [FacilityController::class, 'editfacility'])->name('editfacility'); 
    Route::put('/facility-updateform/{id}', [FacilityController::class, 'update'])->name('update'); 
    Route::delete('/facility/{id}', [FacilityController::class, 'destroy'])->name('facility.destroy');

    Route::get('/admin/service', [ServiceController::class, 'service'])->name('service'); 
    Route::get('/admin/createservice', [ServiceController::class, 'createservice'])->name('createservice'); 
    Route::post('/facility-form', [ServiceController::class, 'store'])->name('storeservice'); 
    Route::get('/admin/editservice/{id}', [ServiceController::class, 'editservice'])->name('editservice'); 
    Route::put('/service-updateform/{id}', [ServiceController::class, 'update'])->name('updateservice'); 
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/admin/province', [ProvinceController::class, 'province'])->name('province'); 
    Route::get('/admin/createprovince', [ProvinceController::class, 'createprovince'])->name('createprovince'); 
    Route::post('/province-form', [ProvinceController::class, 'store'])->name('storeprovince'); 
    Route::get('/admin/editprovince/{id}', [ProvinceController::class, 'editprovince'])->name('editprovince'); 
    Route::put('/province-updateform/{id}', [ProvinceController::class, 'update'])->name('updateprovince'); 
    Route::delete('/province/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');

    Route::get('/admin/district', [DistrictController::class, 'district'])->name('district'); 
    Route::get('/admin/createdistrict', [DistrictController::class, 'createdistrict'])->name('createdistrict'); 
    Route::post('/district-form', [DistrictController::class, 'store'])->name('storedistrict'); 
    Route::get('/admin/editdistrict/{id}', [DistrictController::class, 'editdistrict'])->name('editdistrict'); 
    Route::put('/district-updateform/{id}', [DistrictController::class, 'update'])->name('updatedistrict'); 
    Route::delete('/district/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');

    Route::get('/admin/municipality', [MunicipalityController::class, 'municipality'])->name('municipality'); 
    Route::get('/admin/createmunicipality', [MunicipalityController::class, 'createmunicipality'])->name('createmunicipality'); 
    Route::post('/municipality-form', [MunicipalityController::class, 'store'])->name('storemunicipality'); 
    Route::get('/admin/editmunicipality/{id}', [MunicipalityController::class, 'editmunicipality'])->name('editmunicipality'); 
    Route::put('/municipality-updateform/{id}', [MunicipalityController::class, 'update'])->name('updatemunicipality'); 
    Route::delete('/municipality/{id}', [MunicipalityController::class, 'destroy'])->name('municipality.destroy');
    Route::get('/municipality/search', [MunicipalityController::class, 'search'])->name('municipality.search');

  

});


//customer

Route::get('/customerlogin',[CustomerController::class,'login']);
Route::get('/customersignup',[CustomerController::class,'signup']);

Route::post('/reg-form', [CustomerController::class, 'signupform']);