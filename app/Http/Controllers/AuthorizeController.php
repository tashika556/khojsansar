<?php

namespace App\Http\Controllers;

use App\Models\Authorize;
use Illuminate\Http\Request;


class AuthorizeController extends Controller
{
    public function authorizes()
    {
        $authorize =Authorize::all();
        return view('admin.authorize.authorize-list',compact('authorize'));
    }
    public function createauthorize()
    {
        return view('admin.authorize.authorize-create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'authorize_name.unique' => 'The Authorize name is already added.',
        ];
        $request->validate([
            'authorize_name' => 'required|unique:authorizes',
        ], $messages);
        $authorize = new authorize;
        $authorize->authorize_name = $request->authorize_name;

        $res = $authorize->save();
        if ($res) {   return back()->with('success', 'Congratulations, Authorize is added ');
        } else {
            return back()->with('fail', 'Sorry, Authorize couldnot be added.');
        }
       
    }
    public function editauthorize($id)
    {
        $authorize = Authorize::findOrFail($id);
        return view('admin.authorize.authorize-edit', compact('authorize'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'authorize_name.unique' => 'The Authorize Name is already taken.',
        ];
        
        $request->validate([
            'authorize_name' => 'required|unique:authorizes,authorize_name,' . $id,
        ], $messages);
        
        $authorize = Authorize::findOrFail($id);
        $authorize->authorize_name = $request->authorize_name;
        
        $res = $authorize->save();
        if ($res) {
            return back()->with('success', 'Authorize updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Authorize.');
        }
    }
    public function destroy($id)
{
    $authorize = Authorize::findOrFail($id);
    $res = $authorize->delete();
    
    if ($res) {
        return back()->with('success', 'Authorize deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Authorize.');
    }
}
}
