<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blogs',compact('blogs'));
    }
    public function create()
    {

        return view('admin.blog_add');
    }
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'published_date' => 'required',
            'tags' => 'required',
            ],
            [
            'title.required' => 'This field is required',
            'image.required' => 'This field is required',
            'short_description.required' => 'This field is required',
            'description.required' => 'This field is required',
            'meta_title.required' => 'This field is required',
            'meta_description.required' => 'This field is required',
            'published_date.required' => 'This field is required',
            'tags.required' => 'This field is required',
            ]
        );

        $tagsJson = json_decode($request->tags, true);
        $tagsArray = array_column($tagsJson, 'value');

        $insert= new Blog;
        $insert->title=$request->input('title');
        $insert->tags=implode(',', $tagsArray);
        $insert->short_description=$request->input('short_description');
        $insert->description=$request->input('description');
        $insert->meta_title=$request->input('meta_title');
        $insert->meta_description=$request->input('meta_description');
        $insert->published_at=$request->input('published_date');
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/blogs',$filename);
            $insert->image=$filename;
        }
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.blogs'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function edit($id)
    {

        $blog=Blog::where('id',$id)->first();
        return view('admin/blog_edit',compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            // 'image' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'published_date' => 'required',
            'tags' => 'required',
            ],
            [
            'title.required' => 'This field is required',
            // 'image.required' => 'This field is required',
            'short_description.required' => 'This field is required',
            'description.required' => 'This field is required',
            'meta_title.required' => 'This field is required',
            'meta_description.required' => 'This field is required',
            'published_date.required' => 'This field is required',
            'tags.required' => 'This field is required',
            ]
        );

        $tagsJson = json_decode($request->tags, true);
        $tagsArray = array_column($tagsJson, 'value');

        $update= Blog::find($id);
        $update->title=$request->input('title');
        $update->tags=implode(',', $tagsArray);
        $update->short_description=$request->input('short_description');
        $update->description=$request->input('description');
        $update->meta_title=$request->input('meta_title');
        $update->meta_description=$request->input('meta_description');
        $update->published_at=$request->input('published_date');
        if ($request->file('image')!=null)
        {
            $oldimage=$update->image;

            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/blogs',$filename);
            $update->image=$filename;

            $imagePath = public_path('uploads/blogs/').$oldimage;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $save= $update->save();


        if($save)
        {
          return redirect(route('admin.blogs'))->with('success','Details updated Successfully !');
        }

       else
        {
          return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function destroy($id)
    {
        $banner=Blog::where('id',$id)->first();
        $del=Blog::where('id',$id)->delete();

        $imagePath = public_path('uploads/blogs/').$banner->image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        if($del)
        {
            return redirect(route('admin.blogs'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
}
