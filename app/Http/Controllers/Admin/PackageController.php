<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Package;
use App\Models\Package_image;
use App\Models\Tour_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.packages');
    }
    public function create()
    {
        $id = Auth::user()->id;
        $continents = Continent::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        $tour_types = Tour_type::where('status',1)->get();
        return view('admin.package_add',compact('continents','countries','tour_types'));
    }
    public function store(Request $request)
    {
        $shop_id = Auth::user()->shop_id_user;
        $validated = $request->validate([
            'category' => 'required',
            'category_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:width=1000,height=700',
            ],
            [
            'category.required' => 'This field is required',
            'category_img.required' => 'This field is required',

            ]
        );

        $package= new Package();
        $package->package_title=$request->input('package_title');
        $package->price=$request->input('price');
        $package->group_size=$request->input('group_size');
        $package->continent=$request->input('continent');
        $package->country=$request->input('country');
        $package->tour_type=$request->input('tour_type');
        $package->duration=$request->input('duration');
        $package->about=$request->input('about');
        if ($request->file('main_image')!=null)
        {
            $file=$request->file('main_image');
            $extension=$file->getClientOriginalExtension();
            $filename=$shop_id.'shop'.time().'.'.$extension;
            $file->move('uploads/package/image',$filename);
            $package->main_image=$filename;
        }
        $save= $package->save();

        if ($request->file('images')!=null)
        {
            foreach ($request->file('images') as $index => $b_image) {
            $extension=$b_image->getClientOriginalExtension();
            $filename=$shop_id.$index.time().'.'.$extension;
            $b_image->move('uploads/package/images',$filename);

            $packageimage= new Package_image();
            $packageimage->banner_image=$filename;
            $packageimage->shop_id_banner=$package->id;
            $save= $packageimage->save();
        }
        }


        if($save)
        {
           return redirect(route('admin.category_list'))->with('status','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
}
