<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function banners()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('admin.banners',compact('banners'));
    }
    public function banner_create()
    {

        return view('admin.banner_add');
    }
    public function banner_store(Request $request)
    {
        $id = Auth::user()->id;
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'sub_titile' => 'required',
            // 'category_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:width=1000,height=700',
            ],
            [
            'title.required' => 'This field is required',
            'image.required' => 'This field is required',
            'sub_titile.required' => 'This field is required',
            ]
        );

        $insert= new Banner;
        $insert->title=$request->input('title');
        $insert->subtitle=$request->input('sub_titile');
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/banners',$filename);
            $insert->image=$filename;
        }
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.banners'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function banner_edit($id)
    {

        $banner=Banner::where('id',$id)->first();
        return view('admin/banner_edit',compact('banner'));
    }
    public function banner_update(Request $request, $id)
    {
         $validated = $request->validate([
            'title' => 'required',
            'sub_titile' => 'required',
            // 'category_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:width=1000,height=700',
            ],
            [
            'title.required' => 'This field is required',
            'sub_titile.required' => 'This field is required',
            ]
        );
        $update= Banner::find($id);
        $update->title=$request->input('title');
        $update->subtitle=$request->input('sub_titile');
        if ($request->file('image')!=null)
        {
            $oldimage=$update->image;

            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/banners',$filename);
            $update->image=$filename;

            $imagePath = public_path('uploads/banners/').$oldimage;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $save= $update->save();


        if($save)
        {
          return redirect(route('admin.banners'))->with('success','Details updated Successfully !');
        }

       else
        {
          return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function banner_destroy($id)
    {
        $banner=Banner::where('id',$id)->first();
        $del=Banner::where('id',$id)->delete();

        $imagePath = public_path('uploads/banners/').$banner->image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        if($del)
        {
            return redirect(route('admin.banners'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function gallery()
    {
        $galleryimages = Gallery::orderBy('id', 'desc')->get();
        return view('admin.gallery',compact('galleryimages'));
    }
    public function store_gallery(Request $request)
    {
        $id = Auth::user()->id;
        $validated = $request->validate([
            'image' => 'required',
            // 'category_img' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:width=1000,height=700',
            ],
            [
            'image.required' => 'This field is required',
            ]
        );

        $insert= new Gallery;
        $insert->title=$request->input('title');
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/gallery',$filename);
            $insert->image=$filename;
        }
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.gallery'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function destroy_gallery($id)
    {
        $gallery=Gallery::where('id',$id)->first();
        $del=Gallery::where('id',$id)->delete();

        $imagePath = public_path('uploads/gallery/').$gallery->image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        if($del)
        {
            return redirect(route('admin.gallery'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function contact_settings()
    {
        return view('admin.settings_contact');
    }
    public function aboutus_settings()
    {
        return view('admin.settings_aboutus');
    }
    public function socialmedialinks_settings()
    {
        return view('admin.settings_socialmedialinks');
    }
}
