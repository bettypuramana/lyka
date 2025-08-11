<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Visa;
use App\Models\Visa_document;
use App\Models\Visa_faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $visas = Visa::join('continents', 'visas.continent', '=', 'continents.code')->orderBy('id', 'desc')
                    ->select('visas.*', 'continents.name as continent_name')->get();
        return view('admin.visa',compact('visas'));
    }
        public function create()
    {
        $id = Auth::user()->id;
        $continents = Continent::where('status',1)->orderBy('name', 'asc')->get();
        return view('admin.visa_add',compact('continents'));
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

        $insert= new Visa;
        $insert->title=$request->input('visa_title');
        $insert->continent=$request->input('continent');
        $insert->description=$request->input('description');
        if ($request->file('flag')!=null)
        {
            $file=$request->file('flag');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/visa/flags',$filename);
            $insert->flag=$filename;
        }
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/visa',$filename);
            $insert->image=$filename;
        }
        $save= $insert->save();
        if (is_array($request->input('documents')) && !empty($request->input('documents'))) {
            foreach ($request->input('documents') as $index => $row) {
                    $documents = new Visa_document;
                    $documents->title= $row;
                    $documents->visa_id= $insert->id;
                    $documents->save();
            }
        }
        if (is_array($request->input('questions')) && !empty($request->input('questions'))) {
            foreach ($request->input('questions') as $index => $row) {
                    $faq = new Visa_faq;
                    $faq->question= $row;
                    $faq->answer= $request->input('answers')[$index];
                    $faq->visa_id= $insert->id;
                    $faq->save();
            }
        }

        if($save)
        {
           return redirect(route('admin.visa_list'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
}

