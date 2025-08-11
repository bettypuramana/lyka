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
    public function update(Request $request, $id)
    {


        $update=Visa::find($id);
        $update->title=$request->input('visa_title');
        $update->continent=$request->input('continent');
        $update->description=$request->input('description');
        if ($request->file('flag')!=null)
        {
            $file=$request->file('flag');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/visa/flags',$filename);
            $update->flag=$filename;
        }
        if ($request->file('image')!=null)
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$id.time().'.'.$extension;
            $file->move('uploads/visa',$filename);
            $update->image=$filename;
        }
        $save= $update->save();
        if (is_array($request->input('documents'))) {
            $existingDocs = Visa_document::where('visa_id', $id)->pluck('id')->toArray();
            $incomingIds = $request->input('document_id', []); // hidden IDs from form
            $incomingTitles = $request->input('documents', []);

            // Update or Insert
            foreach ($incomingTitles as $index => $title) {
                $docId = $incomingIds[$index] ?? null;

                if ($docId && in_array($docId, $existingDocs)) {
                    // Update existing
                    Visa_document::where('id', $docId)->update(['title' => $title]);
                } elseif (!empty($title)) {
                    // Insert new
                    $documents = new Visa_document;
                    $documents->title= $title;
                    $documents->visa_id= $id;
                    $documents->save();
                }
            }

            // Delete removed
            $idsToDelete = array_diff($existingDocs, array_filter($incomingIds));
            if (!empty($idsToDelete)) {
                Visa_document::whereIn('id', $idsToDelete)->delete();
            }
        }
        if (is_array($request->input('questions'))) {
            $existingFaqs = Visa_faq::where('visa_id', $id)->pluck('id')->toArray();
            $incomingFaqIds = $request->input('faq_id', []);
            $incomingQuestions = $request->input('questions', []);
            $incomingAnswers = $request->input('answers', []);


            foreach ($incomingQuestions as $index => $question) {
                $faqId = $incomingFaqIds[$index] ?? null;
                $answer = $incomingAnswers[$index] ?? '';

                if ($faqId && in_array($faqId, $existingFaqs)) {

                    Visa_faq::where('id', $faqId)->update([
                        'question' => $question,
                        'answer'   => $answer
                    ]);
                } elseif (!empty($question)) {

                    $faq = new Visa_faq;
                    $faq->question= $question;
                    $faq->answer= $answer;
                    $faq->visa_id= $id;
                    $faq->save();
                }
            }


            $idsToDelete = array_diff($existingFaqs, array_filter($incomingFaqIds));
            if (!empty($idsToDelete)) {
                Visa_faq::whereIn('id', $idsToDelete)->delete();
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
    public function edit($id)
    {

        $visa=Visa::where('id',$id)->first();
        $continents = Continent::where('status',1)->orderBy('name', 'asc')->get();
        return view('admin/visa_edit',compact('visa','continents'));
    }
    public function destroy($id)
    {
        $Visa=Visa::where('id',$id)->first();
        $del=Visa_document::where('visa_id',$id)->delete();
        $del=Visa_faq::where('visa_id',$id)->delete();
        $del=Visa::where('id',$id)->delete();


        $imagePath = public_path('uploads/visa/').$Visa->image;
        $flagPath = public_path('uploads/visa/flags').$Visa->flag;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        if (file_exists($flagPath)) {
            unlink($flagPath);
        }
        if($del)
        {
            return redirect(route('admin.visa_list'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
}

