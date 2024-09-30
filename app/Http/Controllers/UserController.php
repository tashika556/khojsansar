<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Testimonial;
use App\Models\Business;
use App\Models\Category;
use App\Models\BusinessMenu;
use App\Models\BusinessFacility;
use App\Models\Facility;
use App\Models\BusinessService;
use App\Models\Service;
use App\Models\Special;
use App\Models\GalleryPhotosVideos;
use App\Models\SliderPhotosVideos;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\KhojsansarServices;
use App\Models\MainLocationBannerRestaurant;
use App\Services\RestaurantService;

class UserController extends Controller
{ public function index()
    {
        $data = [];
        $data['provinces'] = Province::get(["province_name", "id"]);
        $testimonials = Testimonial::all();
        $khojsansarservice = KhojsansarServices::all();
        $locationrestaurant = MainLocationBannerRestaurant::all();
        $sitesetting = SiteSetting::first();
        $contact = Contact::first();
        $partners = Partner::all();
        $sitesetting->slider_images = json_decode($sitesetting->slider_images, true);
    

    
        return view('frontend.index', $data,compact('locationrestaurant', 'testimonials', 'sitesetting', 'contact', 'partners', 'khojsansarservice'));
    }
    
    public function getCategories(Request $request)
    {
        $municipalityId = $request->municipality_id;
            $categories = Category::whereHas('customers', function($query) use ($municipalityId) {
           
                $query->whereHas('business', function($query) use ($municipalityId) {
                    $query->where('municipality', $municipalityId);
                });
            })->get(['id', 'category_name']);
    
            return response()->json(['categories' => $categories]);
          
       
    }
    
    public function showRestaurantList(Request $request)
    {   $testimonials = Testimonial::all();
        $partners = Partner::all();
        $contact = Contact::first();
        $categoryId = $request->input('category_id');
        $municipalityId = $request->input('municipality_id');
        $searchTerm = $request->input('search');
        $sitesetting= SiteSetting::first();
        $provinces = Province::get(["province_name", "id"]);
        $category = Category::all();
        $khojsansarservice= KhojsansarServices::all();
        $businessesQuery = Business::query();
        $popularRestaurants = RestaurantService::getPopularRestaurants();
        if ($categoryId) {
            $businessesQuery->whereHas('customershow', function ($query) use ($categoryId) {
                $query->where('category', $categoryId);
            });
        }
   
        if ($municipalityId) {
            $businessesQuery->where('municipality', $municipalityId);
        }
  
        if ($searchTerm) {
            $businessesQuery->where(function ($query) use ($searchTerm) {
                $query->where('business', 'like', '%' . $searchTerm . '%')
                      ->orWhere('address', 'like', '%' . $searchTerm . '%')
                      ->orWhere('phone', 'like', '%' . $searchTerm . '%');
            });
        }
    

        $businesses = $businessesQuery->paginate(10)->appends($request->except('page'));

        foreach ($businesses as $business) {
            $business->featuredSpecial = Special::where('business', $business->id)->first();
        }
        return view('frontend.search-list', [
            'businesses' => $businesses,
            'category' => $category,
            'provinces' => $provinces,
            'testimonials' => $testimonials,
            'sitesetting' => $sitesetting,
            'contact' => $contact,
            'partners' => $partners,
            'khojsansarservice'=>$khojsansarservice,
            'popularRestaurants' => $popularRestaurants,
        ]);
    }
    public function showRestaurantdistrictList(Request $request)
    {   
        $testimonials = Testimonial::all();
        $partners = Partner::all();
        $contact = Contact::first();
        $categoryId = $request->input('category_id');
        $districtId = $request->input('district_id');
        $searchTerm = $request->input('search');
        $sitesetting = SiteSetting::first();
        $provinces = Province::get(["province_name", "id"]);
        $category = Category::all();
        $khojsansarservice = KhojsansarServices::all();
        $popularRestaurants = RestaurantService::getPopularRestaurants();
        $businessesQuery = Business::query();

        if ($categoryId) {
            $businessesQuery->whereHas('customershow', function ($query) use ($categoryId) {
                $query->where('category', $categoryId);
            });
        }
        

        if ($districtId) { 
            $businessesQuery->where('district', $districtId);
        }
      

        if ($searchTerm) {
            $businessesQuery->where(function ($query) use ($searchTerm) {
                $query->where('business', 'like', '%' . $searchTerm . '%')
                      ->orWhere('address', 'like', '%' . $searchTerm . '%')
                      ->orWhere('phone', 'like', '%' . $searchTerm . '%');
            });
        }
    
        $businesses = $businessesQuery->paginate(10)->appends($request->except('page'));

        foreach ($businesses as $business) {
            $business->featuredSpecial = Special::where('business', $business->id)->first();
        }

        
        return view('frontend.district-list', [
            'businesses' => $businesses,
            'category' => $category,
            'provinces' => $provinces,
            'testimonials' => $testimonials,
            'sitesetting' => $sitesetting,
            'contact' => $contact,
            'partners' => $partners,
            'khojsansarservice' => $khojsansarservice,
            'popularRestaurants' => $popularRestaurants,
        ]);
    }
    
    public function showRestauranatallList(Request $request)
    {
       
        $testimonials = Testimonial::all();
        $partners = Partner::all();
        $contact = Contact::first();
        $categoryId = $request->input('category_id');
        $municipalityId = $request->input('municipality_id');
        $searchTerm = $request->input('search');
        $sitesetting = SiteSetting::first();
        $provinces = Province::get(['province_name', 'id']);
        $category = Category::all();
        $khojsansarservice = KhojsansarServices::all();
        $popularRestaurants = RestaurantService::getPopularRestaurants();
        $businessesQuery = Business::query();

        if ($categoryId) {
            $businessesQuery->whereHas('customershow', function ($query) use ($categoryId) {
                $query->where('category', $categoryId);
            });
        }

        if ($municipalityId) {
            $businessesQuery->where('municipality', $municipalityId);
        }
    

        if ($searchTerm) {
            $businessesQuery->where(function ($query) use ($searchTerm) {
                $query->where('business', 'like', '%' . $searchTerm . '%')
                      ->orWhere('address', 'like', '%' . $searchTerm . '%')
                      ->orWhere('phone', 'like', '%' . $searchTerm . '%');
            });
        }

        $businesses = $businessesQuery->paginate(10)->appends($request->except('page'));

        foreach ($businesses as $business) {
            $business->featuredSpecial = Special::where('business', $business->id)->first();
        }

        return view('frontend.restaurant-list', [
            'businesses' => $businesses,
            'category' => $category,
            'provinces' => $provinces,
            'testimonials' => $testimonials,
            'sitesetting' => $sitesetting,
            'contact' => $contact,
            'partners' => $partners,
            'khojsansarservice' => $khojsansarservice,
            'popularRestaurants' => $popularRestaurants,
          
        ]);
    }
    
    
    public function showRestaurantDetail($id)
    {
        $partners = Partner::all();
        $testimonials = Testimonial::all();
        $contact = Contact::first();
        $provinces = Province::get(["province_name", "id"]);
        $business = Business::with('customershow', 'menus', 'services')->findOrFail($id);
        $sitesetting = SiteSetting::first();
        $facilities = Facility::whereIn('id', BusinessFacility::where('business', $id)->pluck('facility'))->get();
        $services = Service::whereIn('id', BusinessService::where('business', $id)->pluck('service'))->get();
        $specials = Special::where('business', $id)->get();
        $galleryPhotos = GalleryPhotosVideos::where('business', $id)->get();  
        $sliderPhotos = SliderPhotosVideos::where('business', $id)->get();  
        $khojsansarservice = KhojsansarServices::all();
        $businesses = Business::all(); 

        foreach ($businesses as $businessed) {
            $businessed->featuredSpecial = Special::where('business', $businessed->id)->first(); 
        }
        
    
        return view('frontend.restaurant-detail', [
            'business' => $business,
            'businesses' => $businesses, 
            'provinces' => $provinces,
            'facilities' => $facilities,
            'services' => $services,
            'specials' => $specials,
            'galleryPhotos' => $galleryPhotos,  
            'sliderPhotos' => $sliderPhotos,  
            'latitude' => $business->latitude,
            'longitude' => $business->longitude,
            'testimonials' => $testimonials,
            'sitesetting' => $sitesetting,
            'contact' => $contact,
            'partners' => $partners,
            'khojsansarservice' => $khojsansarservice,
           
        ]);
    }
    
    public function contact()
    { 
        $partners = Partner::all();
        $testimonials = Testimonial::all();
        $sitesetting= SiteSetting::first();
        $contact = Contact::first();
        $khojsansarservice= KhojsansarServices::all();
        return view('frontend/contact', compact('testimonials','sitesetting','contact','partners','khojsansarservice'));
   
 
    }

    
}
    
    


