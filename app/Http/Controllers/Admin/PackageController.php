<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Package;
use App\Models\Package_day_plan;
use App\Models\Package_image;
use App\Models\Package_more;
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
        $packages = Package::orderBy('id', 'desc')->get();
        return view('admin.packages',compact('packages'));
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
        $id = Auth::user()->id;
        // $validated = $request->validate([
        //     'category' => 'required',
        //     'category_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:width=1000,height=700',
        //     ],
        //     [
        //     'category.required' => 'This field is required',
        //     'category_img.required' => 'This field is required',

        //     ]
        // );

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
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/package/image',$filename);
            $package->main_image=$filename;
        }
        $save= $package->save();

        if ($request->file('images')!=null)
        {
            foreach ($request->file('images') as $index => $image) {
            $extension=$image->getClientOriginalExtension();
            $filename=$index.time().'.'.$extension;
            $image->move('uploads/package/images',$filename);

            $packageimage= new Package_image();
            $packageimage->images=$filename;
            $packageimage->package_id=$package->id;
            $save= $packageimage->save();
        }
        }
        if (is_array($request->input('highlights')) && !empty($request->input('highlights'))) {
            foreach ($request->input('highlights') as $index => $row) {
                    $Packagemore = new Package_more;
                    $Packagemore->title= $row;
                    $Packagemore->type= 'highlights';
                    $Packagemore->package_id= $package->id;
                    $Packagemore->save();
            }
        }
        if (is_array($request->input('includes')) && !empty($request->input('includes'))) {
            foreach ($request->input('includes') as $index => $row) {
                    $Packagemore1 = new Package_more;
                    $Packagemore1->title= $row;
                    $Packagemore1->type= 'includes';
                    $Packagemore1->package_id= $package->id;
                    $Packagemore1->save();
            }
        }
        if (is_array($request->input('excludes')) && !empty($request->input('excludes'))) {
            foreach ($request->input('excludes') as $index => $row) {
                    $Packagemore2 = new Package_more;
                    $Packagemore2->title= $row;
                    $Packagemore2->type= 'excludes';
                    $Packagemore2->package_id= $package->id;
                    $Packagemore2->save();
            }
        }

        if (is_array($request->input('day')) && !empty($request->input('day'))) {
            foreach ($request->input('day') as $index => $row) {
                    $Packageplan = new Package_day_plan();
                    $Packageplan->day= $row;
                    $Packageplan->title=$request->input('title')[$index];
                    $Packageplan->description=$request->input('description')[$index];
                    if ($request->file('image_one')[$index]!=null)
                    {
                        $file=$request->file('image_one')[$index];
                        $extension=$file->getClientOriginalExtension();
                        $filename=$id.time().'1.'.$extension;
                        $file->move('uploads/package/images',$filename);
                        $Packageplan->image_one=$filename;
                    }
                    if ($request->file('image_two')[$index]!=null)
                    {
                        $file=$request->file('image_two')[$index];
                        $extension=$file->getClientOriginalExtension();
                        $filename=$id.time().'2.'.$extension;
                        $file->move('uploads/package/images',$filename);
                        $Packageplan->image_two=$filename;
                    }
                    if ($request->file('image_three')[$index]!=null)
                    {
                        $file=$request->file('image_three')[$index];
                        $extension=$file->getClientOriginalExtension();
                        $filename=$id.time().'3.'.$extension;
                        $file->move('uploads/package/images',$filename);
                        $Packageplan->image_three=$filename;
                    }
                    $Packageplan->package_id= $package->id;
                    $Packageplan->save();
            }
        }


        if($save)
        {
           return redirect(route('admin.packages'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
}
