<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Banner; 
use App\Models\Country;
use App\Models\Subscription;
use App\Models\Enquiry;
use App\Models\Blog;
use App\Models\Visa;
use App\Models\Visa_document;
use App\Models\Visa_faq;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\ContactEnquiry;
use DB;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $banners = Banner::all(); // Fetch all banner records
        $countries = Country::where('status', 1)->get(); // Only active countries
        $blogs = Blog::latest()->take(6)->get(); 
        $visas = Visa::latest()->get(); 
        $testimonials = Testimonial::where('status',1)->latest()->get();
        $galleries = Gallery::orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
        return view('user.home', compact('banners','countries','blogs','visas','testimonials','galleries'));
    }
    public function about()
    {
        $testimonials = Testimonial::where('status',1)->latest()->get();
        return view('user.about',compact('testimonials'));
    }
    public function blog_details($id, $slug)
    {
        $blog = Blog::findOrFail($id); // Optionally verify the slug too
        return view('user.blog_details', compact('blog'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        return view('user.blogs', compact('blogs'));
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function gallery()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('user.gallery', compact('galleries'));
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
        $visas = Visa:: get(); // adjust based on your schema
        $continents = DB::table('continents')
                    ->join('visas', 'continents.code', '=', 'visas.continent')
                    ->select('continents.code', 'continents.name')
                    ->distinct()
                    ->get();

        return view('user.visa', compact('visas','continents'));
    }
    public function filterVisas($continentCode)
    {
        if ($continentCode === 'all') {
            $visas = Visa::all();
        } else {
            $visas = Visa::where('continent', $continentCode)->get();
        }

        return view('user.partials.visa_list', compact('visas'));
    }
     public function visa_details($slug)
    {
        $visa = Visa::where('slug', $slug)->firstOrFail();
        $countries = Country::where('status', 1)->get();
        // Fetch related documents and FAQs
        $documents = Visa_document::where('visa_id', $visa->id)->get();
        $faqs = Visa_faq::where('visa_id', $visa->id)->get();

        return view('user.visa_details', compact('visa', 'documents', 'faqs','countries'));
    }
    public function store_visaEnq(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'email'         => 'required|email',
            'nationality_id'=> 'required|integer',
            'travel_to'     => 'required|string|max:255',
        ]);

        DB::table('visa_enquiries')->insert([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'nationality_id'=> $request->nationality_id,
            'travel_to'     => $request->travel_to,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully submitted your enquiry. We will get back to you soon.'
        ]);
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
    public function storeContEnquiry(Request $request)
    {
      
        $validated = $request->validate([
            
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            ],
            [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'subject.required' => 'This field is required',
            'message.required' => 'This field is required', 
            ]
            
        );

        $insertEnquiry= new ContactEnquiry;
        $insertEnquiry->name=$request->input('name');
        $insertEnquiry->email=$request->input('email');
        $insertEnquiry->subject=$request->input('subject');
        $insertEnquiry->message=$request->input('message');
        $save= $insertEnquiry->save();
        if($save){
            return redirect()->route('user.contact')->with('success', 'Your enquiry has been sent successfully!');
        }
        else{
            return redirect()->back()->with('fail', 'Looks like an error please try again later!');
        }
        
    }
    public function store_subscription(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ], [
            'email.required' => 'This field is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already subscribed',
        ]);

        // Save email
        $subscription = new Subscription;
        $subscription->email = $request->email;

        if ($subscription->save()) {
            return redirect()->route('user.home')->with('enquiry_success', true);
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, please try again later!');
        }
    }
}