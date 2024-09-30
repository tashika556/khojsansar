<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\KhojsansarServices;
use App\Models\Business;
use App\Models\Special;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    public function blog()
    {
        $paymentMethods = PaymentMethod::all(); 

        $blog = Blog::all();
        return view('admin.blogs.blog-list',compact('blog','paymentMethods'));
    }
    public function createblog()
    { $paymentMethods = PaymentMethod::all(); 
        return view('admin.blogs.blog-create',compact('paymentMethods'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
    
        ];
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'cover_image'=> 'required|image|mimes:jpg,jpeg,png',
        ], $messages);


        $blog = new Blog;
        $blog->title = $request->title;
        $blog->details = $request->details;


        if($request->hasfile('cover_image'))
        {
    $file =$request->file('cover_image');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('uploads/blog/',$filename);
     $blog-> cover_image = $filename;
        }
       

        $res = $blog->save();
        if ($res) {   return back()->with('success', 'Congratulations, Blogs is added ');
        } else {
            return back()->with('fail', 'Sorry, Blogs couldnot be added.');
        }
       
    }
    public function editblog($id)
    { $paymentMethods = PaymentMethod::all(); 
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.blog-edit', compact('blog','paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'title.unique' => 'The blog title is already taken.',
        ];
        
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id,
            'details' => 'required',
            'cover_image'=> 'sometimes|image|mimes:jpg,jpeg,png',

        ], $messages);
        
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->details = $request->details;



        if ($request->hasFile('cover_image')) {
            $destination = 'uploads/blog/' . $blog->cover_image;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blog/', $filename);
    
            $blog->cover_image = $filename;
        }

        $res = $blog->save();
        if ($res) {
            return back()->with('success', 'Blogs updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the Blogs.');
        }
    }
    public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $res = $blog->delete();
    
    if ($res) {
        return back()->with('success', 'Blogs deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the Blogs.');
    }
}

//view frontend

public function blogview()
{      $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $khojsansarservice = KhojsansarServices::all(); 
    $paymentMethods = PaymentMethod::all(); 
    $blog = Blog::all();
    $businesses = Business::all(); 

    foreach ($businesses as $business) {
        $business->featuredSpecial = Special::where('business', $business->id)->first(); 
    }
    return view('frontend.blog', compact('businesses', 'blog', 'testimonials', 'sitesetting', 'contact', 'partners', 'khojsansarservice'));

}
public function blogdetails($id)
{        $partners = Partner::all();
    $testimonials = Testimonial::all();
    $sitesetting= SiteSetting::first();
    $contact = Contact::first();
    $blog = Blog::findOrFail($id);
    $khojsansarservice = KhojsansarServices::all(); 
    $businesses = Business::all(); 

    foreach ($businesses as $business) {
        $business->featuredSpecial = Special::where('business', $business->id)->first(); 
    }
    return view('frontend.blog-detail', compact('businesses', 'blog', 'partners', 'testimonials', 'sitesetting', 'contact', 'khojsansarservice'));

}
}
