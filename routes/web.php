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
use App\Http\Controllers\BusinessMenuController;
use App\Http\Controllers\BusinessServiceController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PhotosVideosController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\KhojsansarServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MainLocationBannerRestaurantController;
use App\Http\Controllers\Auth\LoginController;

//view frontend


Route::get('/', [UserController::class,'index']);

Route::get('/contact', [UserController::class,'contact']);

Route::get('/restaurant-list', [UserController::class, 'showRestaurantList'])->name('restaurant.list');
Route::get('/restaurants', [UserController::class, 'showRestaurantdistrictList'])->name('restaurant.list');


Route::get('/restaurantall-list', [UserController::class, 'showRestauranatallList'])->name('restaurantall.list');
Route::get('/restaurant-detail/{id}', [UserController::class, 'showRestaurantDetail'])->name('restaurant.detail');

// Review routes
Route::post('/reviews/{business}', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/reviews/{review}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
Route::post('/reviews/{review}/reject', [ReviewController::class, 'reject'])->name('reviews.reject');


// Social login routes
Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/menu-detail/{id}', [MenuController::class, 'showMenuDetail'])->name('menu.detail');
Route::get('/menu-pdf/{id}', [MenuController::class, 'showMenuPdf'])->name('menu.pdf');

Route::post('/getCategories', [UserController::class, 'getCategories']);



Route::get('/testimonialview', [TestimonialController::class,'testimonialview']);

Route::get('/blogview', [BlogController::class,'blogview']);
Route::get('/blog-details/{id}', [BlogController::class, 'blogdetails'])->name('blog.details');

Route::get('/service-details/{id}', [KhojsansarServicesController::class, 'servicedetails'])->name('service.details');

Route::get('/aboutview', [AboutController::class,'aboutview']);

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

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('admin/editprofile', [AdminController::class, 'editprofile'])->name('editprofile');
    Route::put('/admin/updateprofile/{id}', [AdminController::class, 'updateprofile'])->name('updateprofile');
    Route::get('admin/editpassword', [AdminController::class, 'editpassword'])->name('editpassword');
    Route::post('admin/updatepasswords/{id}', [AdminController::class, 'updatepasswords'])->name('updatepasswords');

    Route::get('/admin/testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial');
    Route::get('/admin/createtestimonial', [TestimonialController::class, 'createtestimonial'])->name('createtestimonial'); 
    Route::post('/testimonial-form', [TestimonialController::class, 'store'])->name('storetestimonial');  
    Route::get('/admin/edittestimonial/{id}', [TestimonialController::class, 'edittestimonial'])->name('edittestimonial'); 
    Route::put('/testimonial-updateform/{id}', [TestimonialController::class, 'update'])->name('updatetestimonial'); 
    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    Route::get('/admin/about', [AboutController::class, 'about'])->name('about');
    Route::get('/admin/editabout/{id}', [AboutController::class, 'editabout'])->name('editabout'); 
    Route::put('/about-updateform/{id}', [AboutController::class, 'update'])->name('updateabout'); 


    Route::get('/admin/blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('/admin/createblog', [BlogController::class, 'createblog'])->name('createblog'); 
    Route::post('/blog-form', [BlogController::class, 'store'])->name('storeblog');  
    Route::get('/admin/editblog/{id}', [BlogController::class, 'editblog'])->name('editblog'); 
    Route::put('/blog-updateform/{id}', [BlogController::class, 'update'])->name('updateblog'); 
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/admin/locationrestaurant', [MainLocationBannerRestaurantController::class, 'locationrestaurant'])->name('locationrestaurant');
    Route::get('/admin/createlocationrestaurant', [MainLocationBannerRestaurantController::class, 'createlocationrestaurant'])->name('createlocationrestaurant'); 
    Route::post('/locationrestaurant-form', [MainLocationBannerRestaurantController::class, 'store'])->name('storelocationrestaurant');  
    Route::get('/admin/editlocationrestaurant/{id}', [MainLocationBannerRestaurantController::class, 'editbannerbyrestaurant'])->name('editlocationrestaurant'); 
    Route::put('/locationrestaurant-updateform/{id}', [MainLocationBannerRestaurantController::class, 'update'])->name('updatelocationrestaurant'); 
    Route::delete('/locationrestaurant/{id}', [MainLocationBannerRestaurantController::class, 'destroy'])->name('locationrestaurant.destroy');

    Route::get('/admin/pendingbusiness', [BusinessController::class, 'pendingbusiness'])->name('pendingbusiness');
    Route::get('/admin/viewpendingbusiness/{id}', [BusinessController::class, 'viewpendingbusiness'])->name('viewpendingbusiness');   
    Route::post('/admin/approve-payment/{id}', [BusinessController::class, 'approvePayment'])->name('approvePayment');
    Route::post('/admin/reject-payment/{id}', [BusinessController::class, 'rejectPayment'])->name('rejectPayment');


    Route::get('/admin/verifiedbusiness', [BusinessController::class, 'verifiedbusiness'])->name('verifiedbusiness');
    Route::get('/admin/viewverifiedbusiness/{id}', [BusinessController::class, 'viewverifiedbusiness'])->name('viewverifiedbusiness');  

    Route::get('/admin/notapprovedbusiness', [BusinessController::class, 'notapprovedbusiness'])->name('notapprovedbusiness');
    Route::get('/admin/viewnotapprovedbusiness/{id}', [BusinessController::class, 'viewnotapprovedbusiness'])->name('viewnotapprovedbusiness');  
    
    Route::delete('/businesspayment/{id}', [BusinessController::class, 'destroybusinesspayment'])->name('businesspayment.destroy');

    Route::get('/admin/businesspayment', [PaymentController::class, 'businesspayment'])->name('businesspayment');
    Route::get('/admin/viewbusinesspayment/{id}', [PaymentController::class, 'viewbusinesspayment'])->name('viewbusinesspayment');




    Route::get('/admin/khojsansarservice', [KhojsansarServicesController::class, 'khojsansarservice'])->name('khojsansarservice');
    Route::get('/admin/createkhojsansarservice', [KhojsansarServicesController::class, 'createkhojsansarservice'])->name('createkhojsansarservice'); 
    Route::post('/khojsansarservice-form', [KhojsansarServicesController::class, 'store'])->name('storekhojsansarservice');  
    Route::get('/admin/editkhojsansarservice/{id}', [KhojsansarServicesController::class, 'editkhojsansarservice'])->name('editkhojsansarservice'); 
    Route::put('/khojsansarservice-updateform/{id}', [KhojsansarServicesController::class, 'update'])->name('updatekhojsansarservice'); 
    Route::delete('/khojsansarservice/{id}', [KhojsansarServicesController::class, 'destroy'])->name('khojsansarservice.destroy');

    Route::get('/admin/sitesetting', [SiteSettingController::class, 'sitesetting'])->name('sitesetting');
    Route::get('/admin/editsitesetting/{id}', [SiteSettingController::class, 'editsitesetting'])->name('editsitesetting'); 
    Route::put('/sitesetting-updateform/{id}', [SiteSettingController::class, 'update'])->name('updatesitesetting'); 

    Route::get('/admin/contact', [ContactController::class, 'contact'])->name('contact'); 
    Route::get('/admin/editcontact/{id}', [ContactController::class, 'editcontact'])->name('editcontact'); 
    Route::put('/contact-updateform/{id}', [ContactController::class, 'update'])->name('updatecontact'); 

    Route::get('/admin/partner', [PartnerController::class, 'partner'])->name('partner'); 
    Route::get('/admin/createpartner', [PartnerController::class, 'createpartner'])->name('createpartner'); 
    Route::post('/partner-form', [PartnerController::class, 'store'])->name('storepartner'); 
    Route::get('/admin/editpartner/{id}', [PartnerController::class, 'editpartner'])->name('editpartner'); 
    Route::put('/partner-updateform/{id}', [PartnerController::class, 'update'])->name('updatepartner'); 
    Route::delete('/partner/{id}', [PartnerController::class, 'destroy'])->name('partner.destroy');

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

    Route::get('/admin/payment/{id}', [PaymentMethodController::class, 'payment'])->name('payment');
    Route::put('/admin/payment/{id}', [PaymentMethodController::class, 'update'])->name('payment.update');
    Route::delete('/admin/payment/{id}', [PaymentMethodController::class, 'destroy'])->name('payment.destroy');
  
    
    Route::get('/admin/businessmenu', [BusinessMenuController::class, 'businessmenulist'])->name('businessmenulist');
    Route::get('admin/businessmenu/view/{business}', [BusinessMenuController::class, 'viewBusinessMenu'])->name('admin.businessmenu.view');


});


//customer

Route::get('/customerlogin',[CustomerController::class,'login'])->name('customer.login');
Route::get('/customersignup',[CustomerController::class,'signup'])->name('customer.signup');


Route::get('/customerforgetpassword', [CustomerController::class, 'forgetpassword']);
Route::post('/customer/forget-password', [CustomerController::class, 'sendResetCode'])->name('customer.send-reset-code');
Route::get('/customer/reset-password/{email}', [CustomerController::class, 'showResetPasswordForm'])->name('customer.reset-password');
Route::post('/customer/reset-password', [CustomerController::class, 'resetPassword'])->name('customer.reset-password.submit');

Route::get('/customerchangepassword', [CustomerController::class, 'changepassword']);
Route::post('/customer/update-password', [CustomerController::class, 'updatepassword'])->name('customer.updatepassword');

Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');

Route::post('/reg-form', [CustomerController::class, 'signupform']);
Route::post('/login-form', [CustomerController::class, 'loginform']);

Route::get('/customerhome', [CustomerController::class, 'customerhome'])->name('customerhome');
Route::put('/personalform/{id}', [CustomerController::class, 'updatepersonalform'])->name('updatepersonalform');



Route::get('/business', [BusinessController::class, 'business'])->name('businessview');
Route::post('/businessform/{id}', [BusinessController::class, 'updatebusinessform'])->name('updatebusinessform');
Route::get('/search-business', [BusinessController::class, 'searchBusiness'])->name('search-business');

Route::get('/businessservice/{id}', [BusinessServiceController::class, 'businessservice'])->name('businessserviceview');
Route::post('/businessserviceform/{id}', [BusinessServiceController::class, 'updatebusinessserviceform'])->name('updatebusinessserviceform');

Route::get('/businessfacility/{id}', [BusinessFacilityController::class, 'businessfacility'])->name('businessfacilityview');
Route::post('/businessfacilityform/{id}', [BusinessFacilityController::class, 'store'])->name('updatebusinessfacilityform');


Route::get('/businessmenu/{id}', [BusinessMenuController::class, 'businessmenu'])->name('businessmenuview');
Route::post('/businessmenu/{id}', [BusinessMenuController::class, 'store'])->name('businessmenustore');

Route::get('/businessspecial/{id}', [SpecialController::class, 'businessspecial'])->name('businessspecialview');
Route::post('/businessspecial/{id}', [SpecialController::class, 'store'])->name('businessspecialstore');

Route::get('/businessphotosvideos/{id}', [PhotosVideosController::class, 'businessphotosvideos'])->name('businessphotosvideosview');
Route::post('/business/{businessId}/store-photos', [PhotosVideosController::class, 'store'])->name('businessphotosvideosstore');



Route::get('/businesspayment/{id}', [PaymentController::class, 'payments'])->name('paymentview');
Route::post('/businesspaymentform/{id}', [PaymentController::class, 'store'])->name('updatebusinesspaymentform');



Route::get('/termscondition', [CustomerController::class, 'termscond']);



Route::get('/aboutcustomer',[AboutController::class,'aboutcustomer']);
Route::get('/contactcustomer',[ContactController::class,'contactcustomer']);
Route::get('/reviewcustomer',[ReviewController::class,'reviewcustomer']);