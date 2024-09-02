<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getDistricts(Request $request){
        $data['districts'] =Districts::where("province_id", $request->province_id)->get(["district_name","id"]);

        return response()->json($data);

    }
    public function district()
    {
        $district =District::all();
        return view('admin.district.district-list',compact('district'));
    }
    public function createdistrict()
    {
        $data['provinces']=Province::all();

     
        return view('admin.district.district-create',compact('data'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'district_name.unique' => 'The district name is already added.',
        ];
        $request->validate([
            'district_name' => 'required|unique:districts',
            'province_id' => 'required',
        ], $messages);
        $district = new district;
        $district->district_name = $request->district_name;
        $district->province_id = $request->province_id;

        $res = $district->save();
        if ($res) {   return back()->with('success', 'Congratulations, District is added ');
        } else {
            return back()->with('fail', 'Sorry, District couldnot be added.');
        }
       
    }
    public function editdistrict($id)
    {
        $data['provinces']=Province::all();
        $district = District::findOrFail($id);
        return view('admin.district.district-edit', compact('district','data'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'district_name.unique' => 'The District Name is already taken.',
        ];
        
        $request->validate([
            'district_name' => 'required|unique:districts,district_name,' . $id,
            'province_id' => 'required',
        ], $messages);
        
        $district = District::findOrFail($id);
        $district->district_name = $request->district_name;
        $district->province_id = $request->province_id;
        
        $res = $district->save();
        if ($res) {
            return back()->with('success', 'District updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the District.');
        }
    }
    public function destroy($id)
{
    $district = District::findOrFail($id);
    $res = $district->delete();
    
    if ($res) {
        return back()->with('success', 'District deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the District.');
    }
}
 
}
