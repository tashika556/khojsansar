<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function province()
    {
        $province =Province::all();
        return view('admin.province.province-list',compact('province'));
    }
    public function createprovince()
    {
        return view('admin.province.province-create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'province_name.unique' => 'The Province name is already added.',
        ];
        $request->validate([
            'province_name' => 'required|unique:provinces',
        ], $messages);
        $province = new province;
        $province->province_name = $request->province_name;

        $res = $province->save();
        if ($res) {   return back()->with('success', 'Congratulations, Province is added ');
        } else {
            return back()->with('fail', 'Sorry, Province couldnot be added.');
        }
       
    }
    public function editprovince($id)
    {
        $province = Province::findOrFail($id);
        return view('admin.province.province-edit', compact('province'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'province_name.unique' => 'The Province name is already taken.',
        ];
        
        $request->validate([
            'province_name' => 'required|unique:provinces,province_name,' . $id,
        ], $messages);
        
        $province = Province::findOrFail($id);
        $province->province_name = $request->province_name;
        
        $res = $province->save();
        if ($res) {
            return back()->with('success', 'Province updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Province.');
        }
    }
    public function destroy($id)
{
    $province = Province::findOrFail($id);
    $res = $province->delete();
    
    if ($res) {
        return back()->with('success', 'Province deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Province.');
    }
}
}
