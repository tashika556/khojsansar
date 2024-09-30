<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
   
    public function sitesetting()
    {
        $paymentMethods = PaymentMethod::all(); 

        $sitesetting = SiteSetting::first(); 
        return view('admin.sitesettings.sitesetting-list',compact('sitesetting','paymentMethods'));
    }
    public function createsitesetting()
    { $paymentMethods = PaymentMethod::all(); 
        return view('admin.sitesettings.sitesetting-create',compact('paymentMethods'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
    
        $request->validate([
            'site_title' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'caption' => 'required',
            'slider_images.*' => 'image|mimes:jpeg,png,jpg|max:2097152',
        ], $messages);
    
        $sitesetting = new SiteSetting;
        $sitesetting->site_title = $request->site_title;
        $sitesetting->caption = $request->caption;
    

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('sitesetting/logo'), $logoName);
            $sitesetting->logo = $logoName;
        }

        $sliderImagesArray = [];
        if ($request->hasFile('slider_images')) {
            foreach ($request->file('slider_images') as $sliderimage) {
                $sliderimageName = time() . '_' . $sliderimage->getClientOriginalName();
                $sliderimage->move(public_path('sitesetting/sliders'), $sliderimageName);
                $sliderImagesArray[] = $sliderimageName;
            }
        }

        $sitesetting->slider_images = json_encode($sliderImagesArray);
    
        $res = $sitesetting->save();
    
        if ($res) {
            return back()->with('success', 'Congratulations, Site Setting is added');
        } else {
            return back()->with('fail', 'Sorry, Site Setting could not be added.');
        }
    }
    public function editsitesetting($id)
    {
        $paymentMethods = PaymentMethod::all();
        $sitesetting = SiteSetting::findOrFail($id);

        $sitesetting->slider_images = json_decode($sitesetting->slider_images, true);
    
        return view('admin.sitesettings.sitesetting-edit', compact('sitesetting', 'paymentMethods'));
    }
    
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'logo.required' => 'Logo is required.',
            'logo.image' => 'Logo must be an image.',
        ];
    
        $request->validate([
            'site_title' => 'required|max:255',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg|max:4096',
            'caption' => 'required|max:255',
            'new_slider_images.*' => 'image|mimes:jpeg,png,jpg|max:2097152',
        ], $messages);
    
        $sitesetting = SiteSetting::find($id);
    
        $sitesetting->site_title = $request->site_title;
        $sitesetting->caption = $request->caption;
  
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('sitesetting/logo'), $logoName);
    
            if ($sitesetting->logo && file_exists(public_path('sitesetting/logo/' . $sitesetting->logo))) {
                unlink(public_path('sitesetting/logo/' . $sitesetting->logo));
            }
    
            $sitesetting->logo = $logoName;
        }
   
        $existingSliderImages = json_decode($sitesetting->slider_images, true) ?? [];
    

        if ($request->has('deleted_slider_images')) {
            foreach ($request->deleted_slider_images as $image) {
                if (file_exists(public_path('sitesetting/sliders/' . $image))) {
                    unlink(public_path('sitesetting/sliders/' . $image));
                }
                $existingSliderImages = array_diff($existingSliderImages, [$image]);
            }
        }
    
    
        if ($request->hasFile('new_slider_images')) {
            foreach ($request->file('new_slider_images') as $sliderimage) {
                $sliderimageName = time() . '_' . $sliderimage->getClientOriginalName();
                $sliderimage->move(public_path('sitesetting/sliders'), $sliderimageName);
                $existingSliderImages[] = $sliderimageName;
            }
        }

        $sitesetting->slider_images = json_encode($existingSliderImages);
    
        $sitesetting->save();
    
        return back()->with('success', 'Site settings updated successfully');
    }
    
    }

