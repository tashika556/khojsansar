<?php

namespace App\Http\Controllers;

use App\Models\MainLocationBannerRestaurant;
use App\Models\PaymentMethod;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MainLocationBannerRestaurantController extends Controller
{
    public function locationrestaurant()
    {
        $paymentMethods = PaymentMethod::all(); 

        $locationrestaurant = MainLocationBannerRestaurant::all();
        return view('admin.locationbannerrestaurants.bannerrestaurant-list',compact('locationrestaurant','paymentMethods'));
    }
    public function createlocationrestaurant()
    { $paymentMethods = PaymentMethod::all(); 
        $data['districts'] = District::get(["district_name", "id"]);
        return view('admin.locationbannerrestaurants.bannerrestaurant-create',compact('paymentMethods'),$data);
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
    
        $request->validate([
            'district_id' => 'required',
            'cover_image'=> 'required|image|mimes:jpg,jpeg,png',
        ], $messages);
    
  
        $existingCount = MainLocationBannerRestaurant::where('district_id', $request->district_id)->count();
    
        if ($existingCount >= 5) {
            return back()->with('fail', 'You can only upload up to 5 banners for the selected district.');
        }
    
        $bannerbyrestaurant = new MainLocationBannerRestaurant;
        $bannerbyrestaurant->district_id = $request->district_id;
    
        if($request->hasFile('cover_image'))
        {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/bannerbyrestaurant/', $filename);
            $bannerbyrestaurant->cover_image = $filename;
        }
    
        $res = $bannerbyrestaurant->save();
        if ($res) {
            return back()->with('success', 'Congratulations, Banner for Restaurant Location is added');
        } else {
            return back()->with('fail', 'Sorry, Banner for Restaurant Location could not be added.');
        }
    }
    
    public function editbannerbyrestaurant($id)
    { $paymentMethods = PaymentMethod::all(); 
         $data['districts'] = District::get(["district_name", "id"]);
        $bannerbyrestaurant = MainLocationBannerRestaurant::findOrFail($id);
        return view('admin.locationbannerrestaurants.bannerrestaurant-edit', compact('bannerbyrestaurant','paymentMethods'),$data);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'title.unique' => 'The bannerbyrestaurant title is already taken.',
        ];
        
        $request->validate([
            'district_id' => 'required',
            'cover_image'=> 'required|image|mimes:jpg,jpeg,png',
        ], $messages);
        
        $bannerbyrestaurant = MainLocationBannerRestaurant::findOrFail($id);
        $bannerbyrestaurant->district_id = $request->district_id;



        if ($request->hasFile('cover_image')) {
            $destination = 'uploads/bannerbyrestaurant/' . $bannerbyrestaurant->cover_image;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/bannerbyrestaurant/', $filename);
    
            $bannerbyrestaurant->cover_image = $filename;
        }

        $res = $bannerbyrestaurant->save();
        if ($res) {
            return back()->with('success', 'Banner for Restaurant Location updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Banner for Restaurant Location.');
        }
    }
    public function destroy($id)
{
    $bannerbyrestaurant = MainLocationBannerRestaurant::findOrFail($id);
    $res = $bannerbyrestaurant->delete();
    
    if ($res) {
        return back()->with('success', 'Banner for Restaurant Location deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Banner for Restaurant Location.');
    }
}
}