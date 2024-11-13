<?php

namespace App\Http\Controllers;

use App\Models\BusinessMenu;
use App\Models\Menu;
use App\Models\MenuPdf;
use App\Models\Business;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use App\Models\PaymentMethod;

class BusinessMenuController extends Controller
{
    public function businessmenu($id)
    {
        if (Session::has('loginId')) {
            $customer = Customer::where('id', '=', Session::get('loginId'))->first();
            
            $business = Business::where('customer', $id)->firstOrFail();
            $menuTopics = Menu::with(['menuItems' => function ($query) use ($business) {
                $query->where('business', $business->id);
            }])->get();
            
            $existingPdf = MenuPdf::where('business', $business->id)->first();
            $sitesetting = SiteSetting::first();
            $contact = Contact::first();
    
            return view('customer.form-user.menu', compact('customer', 'menuTopics', 'business', 'existingPdf', 'sitesetting', 'contact'));
        } else {
            return back()->with('fail', 'Sorry, you do not have the right to access it. First, login to continue.');
        }
    }
    

     
    public function store(Request $request, $businessId)
    {
        $messages = [
            'required' => 'The :attribute field is required. Please click remove icon if you do not need it.',
            'photo.mimes' => 'Photos must be of the following file type: jpg, jpeg, or png.',
            'pdf.mimes' => 'File must be of the following file type: pdf.',
        ];
    
  
        $request->validate([
            'title.*.*' => 'sometimes|required|string|max:255',
            'price.*.*' => 'sometimes|required|string|max:255',
            'caption.*.*' => 'nullable|string',
            'photo.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ], $messages);
    
        $business = Business::findOrFail($businessId);
    
        foreach ($request->title as $topicId => $titles) {
            foreach ($titles as $index => $title) {
                $menuId = $request->menu_id[$topicId][$index] ?? null;
                $menuData = [
                    'menu_topic' => $topicId,
                    'business' => $businessId,
                    'title' => $title,
                    'price' => $request->price[$topicId][$index] ?? null,
                    'caption' => $request->caption[$topicId][$index] ?? null,
                ];
    
                if (isset($request->photo[$topicId][$index]) && $request->hasFile("photo.$topicId.$index")) {
                    $menuData['photo'] = $request->file("photo.$topicId.$index")->store('menu_photos', 'public');
                }
    
                if ($menuId) {
                    $menuItem = BusinessMenu::findOrFail($menuId);
                    $menuItem->update($menuData);
                } else {
                    BusinessMenu::create($menuData);
                }
            }
        }
        \Log::info('Request Data:', $request->all());
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('menu_pdfs', 'public');
            \Log::info('PDF uploaded to: ' . $pdfPath);
    
            $existingPdf = MenuPdf::where('business', $businessId)->first();
    
            if ($existingPdf) {
                $existingPdf->update(['pdf' => $pdfPath]);
            } else {
                MenuPdf::create(['pdf' => $pdfPath, 'business' => $businessId]);
            }
        }
        
        session(['businessMenuCompleted' => true]);
        return redirect()->route('businessspecialview', $business->customer)->with('success', 'Menu items and PDF added/updated successfully!');
    }
    public function businessmenulist()
    {
        $paymentMethods = PaymentMethod::all();

        $businessmenu = BusinessMenu::with('businesses.customershow') 
            ->get()
            ->groupBy('business'); 
    
        return view('admin.menu.business-menu-list', compact('businessmenu', 'paymentMethods'));
    }
    public function viewBusinessMenu($businessId)
    {
        $paymentMethods = PaymentMethod::all();
        $business = Business::with('menus')->findOrFail($businessId);
        
        $businessMenus = BusinessMenu::with('menu')->where('business', $businessId)->get();
        $groupedMenus = $businessMenus->groupBy('menu_topic');
        
     
        $menuPDF = MenuPDF::where('business', $businessId)->first();
    
        return view('admin.menu.business-menu-detail', compact('business', 'groupedMenus', 'paymentMethods', 'menuPDF'));
    }
    
    


}
