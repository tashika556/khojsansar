<?php

namespace App\Http\Controllers;

use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;
use App\Models\Business;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use Session;

class PhotosVideosController extends Controller
{

    public function businessphotosvideos($id)
    {
        if (Session::has('loginId')) {
            $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        $sliderphotos = SliderPhotosVideos::all();
        $galleryphotos = GalleryPhotosVideos::all();
        $business = Business::where('customer', $id)->firstOrFail();
        $sitesetting = SiteSetting::first();
        $contact = Contact::first();
        return view('customer.form-user.photos_videos', compact('customer','sliderphotos', 'galleryphotos', 'business','sitesetting','contact'));
    }else{
        return back()->with('fail', 'Sorry, you donot have right to acces it. First, Login to continue');
     }
    }
    public function store(Request $request, $businessId)
    {
        $request->validate([
            'slider_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $business = Business::findOrFail($businessId);
    
        $removedSliderImages = json_decode($request->input('removed_slider_images', '[]'), true);
        $removedGalleryImages = json_decode($request->input('removed_gallery_images', '[]'), true);
    
        if (!empty($removedSliderImages)) {
            SliderPhotosVideos::whereIn('photosvideos', $removedSliderImages)->delete();
            foreach ($removedSliderImages as $image) {
                Storage::delete('public/uploads/slider_photos_videos/' . $image);
            }
        }
    
        if (!empty($removedGalleryImages)) {
            GalleryPhotosVideos::whereIn('photosvideos', $removedGalleryImages)->delete();
            foreach ($removedGalleryImages as $image) {
                Storage::delete('public/uploads/gallery_photos_videos/' . $image);
            }
        }
    
        if ($request->hasFile('slider_images')) {
            foreach ($request->file('slider_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/uploads/slider_photos_videos', $imageName);
                SliderPhotosVideos::create([
                    'business' => $businessId,
                    'photosvideos' => $imageName,
                ]);
            }
        }
    
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/uploads/gallery_photos_videos', $imageName);
                GalleryPhotosVideos::create([
                    'business' => $businessId,
                    'photosvideos' => $imageName,
                ]);
            }
        }
        session(['businessphotos' => true]);
        return redirect()->route('paymentview', $business->customer)->with('success', 'Photos and Videos updated successfully.');
    }
    
 
}