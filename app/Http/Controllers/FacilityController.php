<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
        
    public function facility()
    {
        $facility =Facility::all();
        return view('admin.facility.facility-list',compact('facility'));
    }
    public function createfacility()
    {
        return view('admin.facility.facility-create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'facility_name.unique' => 'The Facility name is already added.',
              'facility_logo.mimes' => 'Facility Logo must be of the following file type: jpg, jpeg or png.'
        
        ];
        $request->validate([
            'facility_name' => 'required|unique:facilities',
            'facility_logo'=> 'required|image|mimes:jpg,jpeg,png',
        ], $messages);
        $facility = new facility;
        $facility->facility_name = $request->facility_name;

        if($request->hasfile('facility_logo'))
        {
    $file =$request->file('facility_logo');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/iconsfacility/',$filename);
     $facility-> facility_logo = $filename;
        }

        $res = $facility->save();
        if ($res) {   return back()->with('success', 'Congratulations, Facility is added ');
        } else {
            return back()->with('fail', 'Sorry, Facility couldnot be added.');
        }
       
    }
    public function editfacility($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facility.facility-edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'facility_name.unique' => 'The facility name is already taken.',
             'facility_logo.mimes' => 'Facility Logo must be of the following file type: jpg, jpeg or png.'
        ];
        
        $request->validate([
            'facility_name' => 'required|unique:facilities,facility_name,' . $id,
            'facility_logo' => 'sometimes|image|required|mimes:jpg,jpeg,png',

        ], $messages);
        
        $facility = Facility::findOrFail($id);
        $facility->facility_name = $request->facility_name;
        if ($request->hasFile('facility_logo')) {
            $destination = 'uploads/iconsfacility/' . $facility->facility_logo;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('facility_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/iconsfacility', $filename);
    
            $facility->facility_logo = $filename;
        }
        $res = $facility->save();
        if ($res) {
            return back()->with('success', 'Facility updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Facility.');
        }
    }
    public function destroy($id)
{
    $facility = Facility::findOrFail($id);
    $res = $facility->delete();
    
    if ($res) {
        return back()->with('success', 'Facility deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Facility.');
    }
}
}