<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuPdf;
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

class MenuController extends Controller
{
    public function menu()
    {
        $menu =Menu::all();
        return view('admin.menu.menu-list',compact('menu'));
    }
    public function store(Request $request)
{
    Menu::create($request->only('menu_topic'));
    return redirect()->route('menu')->with('success', 'Menu created successfully!');
}

public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);
    $menu->update($request->only('menu_topic'));
    return redirect()->route('menu')->with('success', 'Menu updated successfully!');
}

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $res = $menu->delete();
        
        if ($res) {
            return back()->with('success', 'Menu deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete the Menu.');
        }
    }

    public function showMenuDetail($id)
    {
        $provinces = Province::get(["province_name", "id"]);
        $business = Business::with('customershow', 'menus', 'services')->findOrFail($id);
 
        $facilities = Facility::whereIn('id', BusinessFacility::where('business', $id)->pluck('facility'))->get();
        $services = Service::whereIn('id', BusinessService::where('business', $id)->pluck('service'))->get();
        $specials = Special::where('business', $id)->get();
        $galleryPhotos = GalleryPhotosVideos::where('business', $id)->get();  
        $sliderPhotos = SliderPhotosVideos::where('business', $id)->get();  
    
        $menus = Menu::with(['menuItems' => function($query) use ($id) {
            $query->where('business', $id);
        }])->get()->filter(function ($menu) {
            return $menu->menuItems->isNotEmpty();
        });
    
        return view('frontend.digital-menu', [
            'business' => $business,
            'provinces' => $provinces,
            'facilities' => $facilities,
            'services' => $services,
            'specials' => $specials,
            'galleryPhotos' => $galleryPhotos,  
            'sliderPhotos' => $sliderPhotos,  
            'menus' => $menus,
            'latitude' => $business->latitude,
            'longitude' => $business->longitude,
            
        ]);
     
    }
    
    public function showMenuPdf($id)
{
    $pdf = MenuPdf::where('business', $id)->firstOrFail();
    

    return response()->file(public_path('storage/' . $pdf->pdf));
}

}