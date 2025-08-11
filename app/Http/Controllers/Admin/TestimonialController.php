<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $testimonials = Testimonial::where('status',1)->orderBy('id', 'Desc')->get();
        return view('admin.testimonials',compact('testimonials'));
    }
      public function create()
    {
        $id = Auth::user()->id;
        return view('admin.testimonial_add');
    }
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $validated = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
        ],
        [
           'name.required' => 'This field is required',
           'designation.required' => 'This field is required',
           'message.required' => 'This field is required',
           'image.required' => 'This field is required',

        ]);

        $insert= new Testimonial;
        $insert->name=$request->input('name');
        $insert->designation=$request->input('designation');
        $insert->message=$request->input('message');
        
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/testimonial',$filename);
            $insert->image=$filename;
        }
        $save= $insert->save();

        if($save)
        {
           return redirect(route('admin.testimonials'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial_edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        ],
        [
            'name.required' => 'This field is required',
            'designation.required' => 'This field is required',
            'message.required' => 'This field is required',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->input('name');
        $testimonial->designation = $request->input('designation');
        $testimonial->message = $request->input('message');

        if ($request->file('image') != null) {
            // Optional: delete old image
            if ($testimonial->image && file_exists(public_path('uploads/testimonial/' . $testimonial->image))) {
                unlink(public_path('uploads/testimonial/' . $testimonial->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = Auth::id() . time() . '.' . $extension;
            $file->move('uploads/testimonial', $filename);
            $testimonial->image = $filename;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial updated successfully!');
    }
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete the image file if it exists
        if ($testimonial->image && file_exists(public_path('uploads/testimonial/' . $testimonial->image))) {
            unlink(public_path('uploads/testimonial/' . $testimonial->image));
        }

        // Delete from database
        $testimonial->delete();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully!');
    }
}
