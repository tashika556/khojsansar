<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
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

class UserController extends Controller
{  public function index()
    {       $data = [];
        $data['provinces'] = Province::get(["province_name", "id"]);

        return view('frontend/index', $data);
   
 
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
    {
        $categoryId = $request->input('category_id');
        $municipalityId = $request->input('municipality_id');
        $searchTerm = $request->input('search');
      
        $provinces = Province::get(["province_name", "id"]);
        $category = Category::all();

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

        return view('frontend.search-list', [
            'businesses' => $businesses,
            'category' => $category,
            'provinces' => $provinces,
        ]);
    }
    
    
    public function showRestauranatallList(Request $request)
    {
        $categoryId = $request->input('category_id');
        $municipalityId = $request->input('municipality_id');
        $searchTerm = $request->input('search');
    
        $provinces = Province::get(["province_name", "id"]);
        $category = Category::all();
    
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
    
        return view('frontend.restaurant-list', [
            'businesses' => $businesses,
            'category' => $category,
            'provinces' => $provinces,
        ]);
    }
    public function showRestaurantDetail($id)
    {
        $provinces = Province::get(["province_name", "id"]);
        $business = Business::with('customershow', 'menus', 'services')->findOrFail($id);
    
        $facilities = Facility::whereIn('id', BusinessFacility::where('business', $id)->pluck('facility'))->get();
        $services = Service::whereIn('id', BusinessService::where('business', $id)->pluck('service'))->get();
        $specials = Special::where('business', $id)->get();
        $galleryPhotos = GalleryPhotosVideos::where('business', $id)->get();  
        $sliderPhotos = SliderPhotosVideos::where('business', $id)->get();  
    
        return view('frontend.restaurant-detail', [
            'business' => $business,
            'provinces' => $provinces,
            'facilities' => $facilities,
            'services' => $services,
            'specials' => $specials,
            'galleryPhotos' => $galleryPhotos,  
            'sliderPhotos' => $sliderPhotos,  
            'latitude' => $business->latitude,
            'longitude' => $business->longitude,
        ]);
    }
    


    
}
    
    


