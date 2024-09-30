<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function partner()
    {
        $paymentMethods = PaymentMethod::all(); 

        $partner = Partner::all();
        return view('admin.partners.partner-list',compact('partner','paymentMethods'));
    }
    public function createpartner()
    { $paymentMethods = PaymentMethod::all(); 
        return view('admin.partners.partner-create',compact('paymentMethods'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
     
        ]; 
       
        $request->validate([
            'title' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'url' => 'required|url',
        ], $messages);
        $partner = new Partner;
        $partner->title = $request->title;
        $partner->url = $request->url;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('partners'), $logoName);
            $partner->logo = $logoName;
        }

        $res = $partner->save();
        if ($res) {   return back()->with('success', 'Congratulations, Partner is added ');
        } else {
            return back()->with('fail', 'Sorry, Partner couldnot be added.');
        }
       
    }
    public function editpartner($id)
    {
        $partner = Partner::findOrFail($id);
        $paymentMethods = PaymentMethod::all(); 
        return view('admin.partners.partner-edit',compact('partner','paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        
        $request->validate([
            'title' => 'required',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg|max:4096',
            'url' => 'required|url',
        ], $messages);
        
        $partner = Partner::findOrFail($id);
        $partner->title = $request->title;
$partner->url = $request->url;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('partners/'), $logoName);
    
            if ($partner->logo && file_exists(public_path('partners/' . $partner->logo))) {
                unlink(public_path('partners/' . $partner->logo));
            }
    
            $partner->logo = $logoName;
        }
        $res = $partner->save();
        if ($res) {
            return back()->with('success', 'Partner updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Partner.');
        }
    }
    public function destroy($id)
{
    $partner = Partner::findOrFail($id);
    $res = $partner->delete();
    
    if ($res) {
        return back()->with('success', 'Partner deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Partner.');
    }
}
}
