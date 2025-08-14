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
        $continents = Continent::where('status',1)->orderBy('name', 'asc')->get();
        $countries = Country::where('status',1)->orderBy('name', 'asc')->get();
        $tour_types = Tour_type::where('status',1)->orderBy('type', 'asc')->get();
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
        $package->night=$request->input('night');
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
    public function update(Request $request, $id)
    {
        $package= Package::find($id);
        $package->package_title=$request->input('package_title');
        $package->price=$request->input('price');
        $package->group_size=$request->input('group_size');
        $package->continent=$request->input('continent');
        $package->country=$request->input('country');
        $package->tour_type=$request->input('tour_type');
        $package->duration=$request->input('duration');
        $package->night=$request->input('night');
        $package->about=$request->input('about');
        if ($request->hasFile('main_image')) {
        if ($package->main_image && file_exists(public_path('uploads/package/image/'.$package->main_image))) {
            unlink(public_path('uploads/package/image/'.$package->main_image));
        }
        $file = $request->file('main_image');
        $filename = $id.time().'.'.$file->getClientOriginalExtension();
        $file->move('uploads/package/image', $filename);
        $package->main_image = $filename;
    }
        $save= $package->save();

        $existingImages = Package_image::where('package_id', $id)->pluck('id')->toArray();
        $incomingImageIds = $request->image_id ?? [];

        $imagesToDelete = array_diff($existingImages, array_filter($incomingImageIds));
        if (!empty($imagesToDelete)) {
            $toDeleteFiles = Package_image::whereIn('id', $imagesToDelete)->pluck('images')->toArray();
            foreach ($toDeleteFiles as $file) {
                if ($file && file_exists(public_path('uploads/package/images/'.$file))) {
                    unlink(public_path('uploads/package/images/'.$file));
                }
            }
            Package_image::whereIn('id', $imagesToDelete)->delete();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $extension=$image->getClientOriginalExtension();
                $filename=$index.time().'.'.$extension;
                $image->move('uploads/package/images',$filename);

                $packageimage= new Package_image();
                $packageimage->images=$filename;
                $packageimage->package_id=$id;
                $save= $packageimage->save();
            }
        }
        $this->updatePackageMore($id, $request->input('highlights'), 'highlights');
        $this->updatePackageMore($id, $request->input('includes'), 'includes');
        $this->updatePackageMore($id, $request->input('excludes'), 'excludes');

        $existingPlans = Package_day_plan::where('package_id', $id)->pluck('id')->toArray();
        $incomingPlanIds = $request->dayplan_id ?? [];

        $plansToDelete = array_diff($existingPlans, array_filter($incomingPlanIds));
        if (!empty($plansToDelete)) {
            $toDeletePlans = Package_day_plan::whereIn('id', $plansToDelete)->get();
            foreach ($toDeletePlans as $plan) {
                foreach (['image_one', 'image_two', 'image_three'] as $imgField) {
                    if ($plan->$imgField && file_exists(public_path('uploads/package/images/'.$plan->$imgField))) {
                        unlink(public_path('uploads/package/images/'.$plan->$imgField));
                    }
                }
            }
            Package_day_plan::whereIn('id', $plansToDelete)->delete();
        }



        if (is_array($request->day)) {
        foreach ($request->day as $index => $day) {
            $planId = $incomingPlanIds[$index] ?? null;

            if ($planId && in_array($planId, $existingPlans)) {
                $plan = Package_day_plan::find($planId);
            } else {
                $plan = new Package_day_plan();
                $plan->package_id = $id;
            }

            $plan->day = $day;
            $plan->title = $request->title[$index] ?? '';
            $plan->description = $request->description[$index] ?? '';


                if (isset($request->file('image_one')[$index])) {
                    if ($plan->image_one && file_exists(public_path('uploads/package/images/'.$plan->image_one))) {
                        unlink(public_path('uploads/package/images/'.$plan->image_one));
                    }
                    $file=$request->file('image_one')[$index];
                    $extension=$file->getClientOriginalExtension();
                    $filename=$id.time().'1.'.$extension;
                    $file->move('uploads/package/images',$filename);
                    $plan->image_one=$filename;
                }
                if (isset($request->file('image_two')[$index]))
                    {
                        if ($plan->image_two && file_exists(public_path('uploads/package/images/'.$plan->image_two))) {
                        unlink(public_path('uploads/package/images/'.$plan->image_two));
                        }
                        $file=$request->file('image_two')[$index];
                        $extension=$file->getClientOriginalExtension();
                        $filename=$id.time().'2.'.$extension;
                        $file->move('uploads/package/images',$filename);
                        $plan->image_two=$filename;
                    }
                    if (isset($request->file('image_three')[$index]))
                    {
                        if ($plan->image_three && file_exists(public_path('uploads/package/images/'.$plan->image_three))) {
                        unlink(public_path('uploads/package/images/'.$plan->image_three));
                        }
                        $file=$request->file('image_three')[$index];
                        $extension=$file->getClientOriginalExtension();
                        $filename=$id.time().'3.'.$extension;
                        $file->move('uploads/package/images',$filename);
                        $plan->image_three=$filename;
                    }


            $plan->save();
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
    private function updatePackageMore($packageId, $items, $type)
    {
        $existingIds = Package_more::where('package_id', $packageId)->where('type', $type)->pluck('id')->toArray();
        $incomingIds = request()->input("{$type}_id") ?? [];

        // Delete removed
        $toDelete = array_diff($existingIds, array_filter($incomingIds));
        if (!empty($toDelete)) {
            Package_more::whereIn('id', $toDelete)->delete();
        }

        if (is_array($items)) {
            foreach ($items as $index => $title) {
                $id = $incomingIds[$index] ?? null;
                if ($id && in_array($id, $existingIds)) {
                    Package_more::where('id', $id)->update(['title' => $title]);
                } elseif (!empty($title)) {
                    $Packagemore = new Package_more;
                    $Packagemore->title= $title;
                    $Packagemore->type= $type;
                    $Packagemore->package_id= $packageId;
                    $Packagemore->save();
                }
            }
        }
}
    public function edit($id)
    {

        $package=Package::where('id',$id)->first();
        $continents = Continent::where('status',1)->orderBy('name', 'asc')->get();
        $countries = Country::where('status',1)->orderBy('name', 'asc')->get();
        $tour_types = Tour_type::where('status',1)->orderBy('type', 'asc')->get();
        return view('admin/package_edit',compact('package','continents','countries','tour_types'));
    }
    public function destroy($id)
    {
        $package=Package::where('id',$id)->first();
        $imagePath = public_path('uploads/package/image/').$package->main_image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $packageimages=Package_image::where('package_id',$id)->get();
        foreach($packageimages as $row){
            $imagePath = public_path('uploads/package/images/').$row->images;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        }
        $dayPlanimages=Package_day_plan::where('package_id',$id)->get();
        foreach($dayPlanimages as $row){
        $imagePath1 = public_path('uploads/package/images/').$row->image_one;

        if (file_exists($imagePath1)) {
            unlink($imagePath1);
        }
        $imagePath2 = public_path('uploads/package/images/').$row->image_two;

        if (file_exists($imagePath2)) {
            unlink($imagePath2);
        }
        $imagePath3 = public_path('uploads/package/images/').$row->image_three;

        if (file_exists($imagePath3)) {
            unlink($imagePath3);
        }
        }

        $del=Package_more::where('package_id',$id)->delete();
        $del=Package_image::where('package_id',$id)->delete();
        $del=Package_day_plan::where('package_id',$id)->delete();
        $del=Package::where('id',$id)->delete();



        if($del)
        {
            return redirect(route('admin.packages'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function change_status($id, $status)
    {
        $package = Package::find($id);
        $package->status = $status == 1 ? 0 : 1;
        $package->save();

        return redirect()->back()->with('success', 'Package status updated.');
    }
}
