<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Models\District;


class MunicipalityController extends Controller
{
    public function getMunicipalitys(Request $request){
        $data['municipalities'] =Municipality::where("district_id", $request->district_id)->get(["municipality_name","id"]);

        return response()->json($data);

    }
    public function municipality()
    {
      
        $municipality = Municipality::all();
        return view('admin.municipality.municipality-list', compact('municipality'));
    }

    

    public function createmunicipality()
    {
        $data['districts']=District::all();

     
        return view('admin.municipality.municipality-create',compact('data'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'municipality_name.unique' => 'The Municipality name is already added.',
        ];
        $request->validate([
            'municipality_name' => 'required|unique:municipalities',
            'district_id' => 'required',
        ], $messages);
        $municipality = new municipality;
        $municipality->municipality_name = $request->municipality_name;
        $municipality->municipality_shortname = $request->municipality_shortname;
        $municipality->district_id = $request->district_id;

        $res = $municipality->save();
        if ($res) {   return back()->with('success', 'Congratulations, Municipality is added ');
        } else {
            return back()->with('fail', 'Sorry, Municipality couldnot be added.');
        }
       
    }
    public function editmunicipality($id)
    {
        $data['districts']=District::all();
        $municipality = Municipality::findOrFail($id);
        return view('admin.municipality.municipality-edit', compact('municipality','data'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'municipality_name.unique' => 'The Municipality name is already added.',
        ];
        
        $request->validate([
            'municipality_name' => 'required|unique:municipalities,municipality_name,' . $id,
            'district_id' => 'required',
        ], $messages);
        
        $municipality = Municipality::findOrFail($id);
        $municipality->municipality_name = $request->municipality_name;
        $municipality->municipality_shortname = $request->municipality_shortname;
        $municipality->district_id = $request->district_id;
        
        $res = $municipality->save();
        if ($res) {
            return back()->with('success', 'Municipality updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Municipality.');
        }
    }
    public function destroy($id)
{
    $municipality = Municipality::findOrFail($id);
    $res = $municipality->delete();
    
    if ($res) {
        return back()->with('success', 'Municipality deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Municipality.');
    }
}
 
 }