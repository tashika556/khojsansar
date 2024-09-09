<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\BusinessFacilityController;
use App\Http\Controllers\BusinessServiceController;

//view frontend
Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/contact', function () {
    return view('frontend/contact');
});
Route::get('/map', function () {
    return view('frontend/map');
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


    Route::get('/admin/authorize', [AuthorizeController::class, 'authorizes'])->name('authorizes'); 
    Route::get('/admin/createauthorize', [AuthorizeController::class, 'createauthorize'])->name('createauthorize'); 
    Route::post('/authorize-form', [AuthorizeController::class, 'store'])->name('storeauthorize'); 
    Route::get('/admin/editauthorize/{id}', [AuthorizeController::class, 'editauthorize'])->name('editauthorize'); 
    Route::put('/authorize-updateform/{id}', [AuthorizeController::class, 'update'])->name('updateauthorize'); 
    Route::delete('/authorize/{id}', [AuthorizeController::class, 'destroy'])->name('authorize.destroy');

    Route::get('/admin/pendingcustomer', [AdminController::class, 'pendingcustomers'])->name('pendingcustomers'); 
    Route::get('/admin/viewpendingcustomer/{id}', [AdminController::class, 'viewpendingcustomers'])->name('viewpendingcustomers'); 
    Route::post('/admin/pendingcustomer/{id}/verify', [AdminController::class, 'verifypendingCustomer'])->name('pendingcustomer.verify');
    Route::post('/admin/pendingcustomer/{id}/reject', [AdminController::class, 'rejectpendingCustomer'])->name('pendingcustomer.reject');  

    Route::delete('/customer/{id}', [AdminController::class, 'destroycustomer'])->name('customer.destroy');

    Route::get('/admin/verifiedcustomer', [AdminController::class, 'verifiedcustomers'])->name('verifiedcustomers'); 
    Route::get('/admin/viewverifiedcustomer/{id}', [AdminController::class, 'viewverifiedcustomers'])->name('viewverifiedcustomers');   


    Route::get('/admin/rejectedcustomer', [AdminController::class, 'rejectedcustomers'])->name('rejectedcustomers'); 
    Route::get('/admin/viewrejectedcustomer/{id}', [AdminController::class, 'viewrejectedcustomers'])->name('viewrejectedcustomers');   


    Route::get('/admin/verifiedcustomer', [AdminController::class, 'verifiedcustomers'])->name('verifiedcustomers'); 
    Route::get('/admin/viewverifiedcustomer/{id}', [AdminController::class, 'viewverifiedcustomers'])->name('viewverifiedcustomers');  


    Route::get('/admin/menu', [MenuController::class, 'menu'])->name('menu'); 
    Route::post('/admin/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    
    Route::get('/admin/businessmenu', [MenuController::class, 'businessmenu'])->name('businessmenu'); 

});


//customer

Route::get('/customerlogin',[CustomerController::class,'login']);
Route::get('/customersignup',[CustomerController::class,'signup']);

Route::post('/reg-form', [CustomerController::class, 'signupform']);
Route::post('/login-form', [CustomerController::class, 'loginform']);

Route::get('/customerhome', [CustomerController::class, 'customerhome']);
Route::put('/personalform/{id}', [CustomerController::class, 'updatepersonalform'])->name('updatepersonalform');



Route::get('/business', [BusinessController::class, 'business'])->name('businessview');
Route::post('/businessform/{id}', [BusinessController::class, 'updatebusinessform'])->name('updatebusinessform');
Route::get('/search-business', [BusinessController::class, 'searchBusiness'])->name('search-business');

Route::get('/businessservice/{id}', [BusinessServiceController::class, 'businessservice'])->name('businessserviceview');
Route::post('/businessserviceform/{id}', [BusinessServiceController::class, 'updatebusinessserviceform'])->name('updatebusinessserviceform');

Route::get('/businessfacility/{id}', [BusinessFacilityController::class, 'businessfacility'])->name('businessfacilityview');
Route::post('/businessfacilityform/{id}', [BusinessFacilityController::class, 'updatebusinessfacilityform'])->name('updatebusinessfacilityform');


Route::get('/termscondition', [CustomerController::class, 'termscond']);