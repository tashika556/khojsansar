<?php

namespace App\Http\Controllers;

use App\Models\SliderPhotosVideos;
use App\Models\GalleryPhotosVideos;
use App\Models\Business;
use Illuminate\Http\Request;

class PhotosVideosController extends Controller
{
 
    public function businessphotosvideos($id)
    {
        $sliderphotos = SliderPhotosVideos::all();
        $galleryphotos = GalleryPhotosVideos::all();
        $business = Business::where('customer', $id)->firstOrFail();
    
        return view('customer.form-user.photos_videos', compact('sliderphotos','galleryphotos', 'business'));
    }
}
