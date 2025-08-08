<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Banner; 
use App\Models\Country;
use App\Models\Enquiry;
use App\Models\Blog;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $banners = Banner::all(); // Fetch all banner records
        $countries = Country::where('status', 1)->get(); // Only active countries
        $blogs = Blog::latest()->take(6)->get(); 
        return view('user.home', compact('banners','countries','blogs'));
    }
    public function about()
    {
        return view('user.about');
    }
    public function blog_details($id, $slug)
    {
        $blog = Blog::findOrFail($id); // Optionally verify the slug too
        return view('user.blog_details', compact('blog'));
    }

    public function blogs()
    {
        return view('user.blogs');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function gallery()
    {
        return view('user.gallery');
    }
    public function package_details()
    {
        return view('user.package_details');
    }
    public function packages()
    {
        return view('user.packages');
    }
    public function privacy_policy()
    {
        return view('user.privacy_policy');
    }
    public function terms_and_conditions()
    {
        return view('user.terms_and_conditions');
    }
    public function visa()
    {
        return view('user.visa');
    }
     public function visa_details()
    {
        return view('user.visa_details');
    }
    public function store_enquiry(Request $request)
    {
      
        $validated = $request->validate([
            
            'destination' => 'required',
            'quantity' => 'required',
            'travel_date' => 'required',
            'name' => 'required',
            'phone' => 'required',            
            ],
            [
            'destination.required' => 'This field is required',
            'quantity.required' => 'This field is required',
            'travel_date.required' => 'This field is required',
            'name.required' => 'This field is required', 
            'phone.required' => 'This field is required',  
            ]
            
        );

        $insertEnquiry= new Enquiry;
        $insertEnquiry->destination=$request->input('destination');
        $insertEnquiry->passengers=$request->input('quantity');
        $insertEnquiry->travel_date = date('Y-m-d', strtotime($request->input('travel_date')));
        $insertEnquiry->name=$request->input('name');
        $insertEnquiry->phone=$request->input('phone');
        $save= $insertEnquiry->save();
        if($save){
            return redirect()->route('user.home')->with('enquiry_success', true);
        }
        else{
            return redirect()->back()->with('fail', 'Looks like an error please try again later!');
        }
        
    }
}