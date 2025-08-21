<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour_type;
use Illuminate\Http\Request;

class TourTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tour_type = Tour_type::get();
        return view('admin.tour_type',compact('tour_type'));
    }
    public function tour_type_store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            ],
            [
            'type.required' => 'This field is required',
            ]
        );

        $insert= new Tour_type;
        $insert->type=$request->input('type');
        $insert->status =1;
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.tour_type'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
   
    public function tour_type_destroy($id)
    {
        $del=Tour_type::where('id',$id)->delete();

        if($del)
        {
            return redirect(route('admin.tour_type'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    
}
