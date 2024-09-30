<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
            
    public function service()
    {
        $service =Service::all();
        return view('admin.services.service-list',compact('service'));
    }
    public function createservice()
    {
        return view('admin.services.service-create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'service_name.unique' => 'The Service name is already added.',
              'service_logo.mimes' => 'Service Logo must be of the following file type: jpg, jpeg or png.'
        
        ];
        $request->validate([
            'service_name' => 'required|unique:services',
            'service_logo'=> 'required|image|mimes:jpg,jpeg,png',
        ], $messages);
        $service = new service;
        $service->service_name = $request->service_name;

        if($request->hasfile('service_logo'))
        {
    $file =$request->file('service_logo');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/iconsservice/',$filename);
     $service-> service_logo = $filename;
        }

        $res = $service->save();
        if ($res) {   return back()->with('success', 'Congratulations, Service is added ');
        } else {
            return back()->with('fail', 'Sorry, Service couldnot be added.');
        }
       
    }
    public function editservice($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.service-edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'service_name.unique' => 'The Service name is already taken.',
             'service_logo.mimes' => 'Service Logo must be of the following file type: jpg, jpeg or png.'
        ];
        
        $request->validate([
            'service_name' => 'required|unique:services,service_name,' . $id,
            'service_logo' => 'sometimes|image|required|mimes:jpg,jpeg,png',

        ], $messages);
        
        $service = Service::findOrFail($id);
        $service->service_name = $request->service_name;
        if ($request->hasFile('service_logo')) {
            $destination = 'uploads/iconsservice/' . $service->service_logo;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('service_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/iconsservice', $filename);
    
            $service->service_logo = $filename;
        }
        $res = $service->save();
        if ($res) {
            return back()->with('success', 'Service updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Service.');
        }
    }
    public function destroy($id)
{
    $service = Service::findOrFail($id);
    $res = $service->delete();
    
    if ($res) {
        return back()->with('success', 'Service deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Service.');
    }
}
}
