<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Business;
use App\Models\SiteSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use DB;
use Session;


class ReviewController extends Controller
{
    public function store(Request $request, $businessId)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

   
        $business = Business::findOrFail($businessId);

   
        $reviewData = $request->only(['name', 'email', 'review', 'rating']);
        $review = new Review($reviewData);


        $business->reviews()->save($review);

        return redirect()->back()->with('success', 'Review submitted successfully.It will be published shortly after verification.')
                                 ->withInput($request->only('name', 'email', 'review', 'rating'));
    }
   


    

    public function reviewcustomer()
    {  if (Session::has('loginId')) {
        $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        $sitesetting= SiteSetting::first();
        $contact = Contact::first();
        $reviews = Review::all();
        $pendingreviews = Review::where('approved', 0)
        ->where('rejected', 0)
        ->get();
        $approvedreviews = Review::where('approved', 1)
        ->where('rejected', 0)
        ->get();

        $rejectedreviews = Review::where('approved', 0)
        ->where('rejected', 1)
        ->get();

        return view('customer/review', compact('customer','sitesetting','contact','reviews','pendingreviews','approvedreviews','rejectedreviews'));
    }else{
        return back()->with('fail', 'Sorry, You donot have right to acces it. First, Login to continue');
     }
 
    }
    public function approve($reviewId)
{
    $review = Review::findOrFail($reviewId);
    $review->approved = 1;
    $review->rejected = 0;
    $review->save();

    return redirect()->back()->with('success', 'Review approved successfully.');
}

public function reject($reviewId)
{
    $review = Review::findOrFail($reviewId);
    $review->approved = 0;
    $review->rejected = 1;
    $review->save();

    return redirect()->back()->with('success', 'Review rejected successfully.');
}

}