<?php

namespace App\Http\Controllers;

use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosVideosController extends Controller
{
 
    public function businessphotosvideos($id)
    {
        $sliderphotos = SliderPhotosVideos::all();
        $galleryphotos = GalleryPhotosVideos::all();
        $business = Business::where('customer', $id)->firstOrFail();
    
        return view('customer.form-user.photos_videos', compact('sliderphotos', 'galleryphotos', 'business'));
    }
    public function store(Request $request, $businessId)
    {
        $request->validate([
            'slider_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'removed_slider_images.*' => 'sometimes|exists:slider_photos_videos,photosvideos',
            'removed_gallery_images.*' => 'sometimes|exists:gallery_photos_videos,photosvideos',
        ]);
    
        $business = Business::findOrFail($businessId);

        if ($request->filled('removed_slider_images')) {
            SliderPhotosVideos::whereIn('photosvideos', $request->removed_slider_images)->delete();
            foreach ($request->removed_slider_images as $image) {
                Storage::delete('public/uploads/slider_photos_videos/' . $image);
            }
        }

        if ($request->filled('removed_gallery_images')) {
            GalleryPhotosVideos::whereIn('photosvideos', $request->removed_gallery_images)->delete();
            foreach ($request->removed_gallery_images as $image) {
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
    
        return redirect()->route('paymentview', $business->customer)->with('success', 'Photos and Videos updated successfully.');
    }  
}