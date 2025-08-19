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
use App\Models\Package;
use App\Models\ContactEnquiry;
use App\Models\Continent;
use App\Models\Package_day_plan;
use App\Models\Package_more;
use App\Models\Package_image;
use App\Models\Tour_type;
use App\Models\Setting_tbl;
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
        $packages = Package::with(['countryName', 'tourType'])
                       ->orderBy('created_at', 'desc')
                       ->take(6)
                       ->get();
        $settings = Setting_tbl::first();
        return view('user.home', compact('banners','countries','blogs','visas','testimonials','galleries','packages','settings'));
    }
    public function about()
    {
        $testimonials = Testimonial::where('status',1)->latest()->get();
        $about = Setting_tbl::first(); // get single row
        $settings = Setting_tbl::first();
        return view('user.about',compact('testimonials','about','settings'));
    }
    public function blog_details($id, $slug)
    {
        $blog = Blog::findOrFail($id); // Optionally verify the slug too
        $settings = Setting_tbl::first();
        return view('user.blog_details', compact('blog','settings'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        $settings = Setting_tbl::first();
        return view('user.blogs', compact('blogs','settings'));
    }
    public function contact()
    {
        $settings = Setting_tbl::first();
        return view('user.contact',compact('settings'));
    }
    public function gallery()
    {

        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        $settings = Setting_tbl::first();
        return view('user.gallery', compact('galleries','settings'));
    }
   public function package_details($id, $slug)
    {
        $package = Package::where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        // Get package images
        // $images = Package_image::where('package_id', $package->id)->pluck('images')->toArray();

        // // Merge main image + extra images
        // $allImages = collect([$package->main_image])->merge($images);

        // // Get first 3 images for display
        // $displayImages = $allImages->take(3);

        $mainImage = $package->main_image
    ? asset('uploads/package/image/' . $package->main_image)
    : null;

$images = Package_image::where('package_id', $package->id)
    ->pluck('images')
    ->map(function ($img) {
        return asset('uploads/package/images/' . $img);
    });

$allImages = collect([$mainImage])->merge($images)->filter();

$displayImages = $allImages->take(3)->values();

        $highlights = Package_more::where('package_id', $package->id)->where('type', 'highlights')->get();
        $includes = Package_more::where('package_id', $package->id)->where('type', 'includes')->get();
        $excludes = Package_more::where('package_id', $package->id)->where('type', 'excludes')->get();

        $dayPlans = Package_day_plan::where('package_id', $package->id)
            ->orderBy('day', 'asc')
            ->get();

        $country = Country::find($package->country);
        $continent = Continent::find($package->continent);
        $tourType = Tour_type::find($package->tour_type);
        $settings = Setting_tbl::first();
$countries = Country::where('status', 1)->get();
        return view('user.package_details', compact(
            'package',
            'images',        // still available if needed
            'allImages',     // for Fancybox
            'displayImages', // for showing the first 3
            'highlights',
            'includes',
            'excludes',
            'dayPlans',
            'country',
            'tourType',
            'continent',
            'countries',
            'settings'
        ));
    }


    public function packages(Request $request)
    {
        // Get distinct continent names
        $continents = \DB::table('continents')
            ->select('code', 'name')
            ->whereIn('code', Package::distinct()->pluck('continent'))
            ->get();

        // Get distinct tour type names
        $tourTypes = \DB::table('tour_types')
            ->select('id', 'type')
            ->whereIn('id', Package::distinct()->pluck('tour_type'))
            ->get();

        // Build query with filters
        $query = Package::query()
                ->join('countries', 'packages.country', '=', 'countries.id')
                ->select('packages.*', 'countries.name as country_name');
        if ($request->continent && $request->continent != 'all') {
            $query->where('continent', $request->continent);
        }

        if ($request->tour_type) {
            $query->where('tour_type', $request->tour_type);
        }

        $packages = $query->get();
        $settings = Setting_tbl::first();
        return view('user.packages', compact('packages', 'continents', 'tourTypes','settings'));
    }


    public function privacy_policy()
    {
        $settings = Setting_tbl::first();
        return view('user.privacy_policy',compact('settings'));
    }
    public function terms_and_conditions()
    {
        $settings = Setting_tbl::first();
        return view('user.terms_and_conditions',compact('settings'));
    }
    public function visa()
    {
        $visas = Visa:: get(); // adjust based on your schema
        $continents = DB::table('continents')
                    ->join('visas', 'continents.code', '=', 'visas.continent')
                    ->select('continents.code', 'continents.name')
                    ->distinct()
                    ->get();
        $settings = Setting_tbl::first();
        return view('user.visa', compact('visas','continents','settings'));
    }
    public function filterVisas($continentCode)
    {
        if ($continentCode === 'all') {
            $visas = Visa::all();
        } else {
            $visas = Visa::where('continent', $continentCode)->get();
        }
        $settings = Setting_tbl::first();
        return view('user.partials.visa_list', compact('visas','settings'));
    }
     public function visa_details($slug)
    {
        $visa = Visa::where('slug', $slug)->firstOrFail();
        $countries = Country::where('status', 1)->get();
        // Fetch related documents and FAQs
        $documents = Visa_document::where('visa_id', $visa->id)->get();
        $faqs = Visa_faq::where('visa_id', $visa->id)->get();
        $settings = Setting_tbl::first();
        return view('user.visa_details', compact('visa', 'documents', 'faqs','countries','settings'));
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
            'phone'       => ['required|max:20', 'regex:/^\+[1-9][0-9]{7,14}$/'],
            ],
            [
            'destination.required' => 'This field is required',
            'quantity.required' => 'This field is required',
            'travel_date.required' => 'This field is required',
            'name.required' => 'This field is required',
            'phone.required'       => 'This field is required',
            'phone.regex'          => 'Phone number must be in international format (e.g. +971501234567)',
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
            //return redirect()->route('user.home')->with('enquiry_success', true);
            return redirect()->back()->with('enquiry_success', true)->withInput([]);

        }
        else{
            return redirect()->back()->with('fail', 'Looks like an error please try again later!');
        }

    }
    public function storeContEnquiry(Request $request)
    {

        $validated = $request->validate([

            'name' => 'required',
            'email' => 'required|email',
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
