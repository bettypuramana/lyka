<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;

class GeographyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function continents()
    {
        $continents = Continent::get();
        return view('admin.continents',compact('continents'));
    }
    public function continent_store(Request $request)
    {
        $validated = $request->validate([
            'continent' => 'required',
            'continent_code' => 'required|unique:continents,code',
            ],
            [
            'continent.required' => 'This field is required',
            'continent_code.required' => 'This field is required',
            ]
        );

        $insert= new Continent;
        $insert->name=$request->input('continent');
        $insert->code =$request->input('continent_code');
        $insert->status =1;
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.continents'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function continent_change_status($code, $status)
    {
        $continent = Continent::where('code',$code)->first();
        $continent->status = $status == 1 ? 0 : 1;
        $continent->save();

        return redirect()->back()->with('success', 'Continent status updated.');
    }
    public function continent_destroy($id)
    {
        $del=Continent::where('code',$id)->delete();

        if($del)
        {
            return redirect(route('admin.continents'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function countries()
    {
        $countries = Country::join('continents', 'countries.continent_id', '=', 'continents.code')->orderBy('countries.name', 'asc')
        ->select('countries.*', 'continents.name as continent_name')->get();
        $continents = Continent::where('status',1)->orderBy('name', 'asc')->get();
        return view('admin.countries',compact('countries','continents'));
    }
    public function country_store(Request $request)
    {
        $validated = $request->validate([
            'country' => 'required',
            'continent' => 'required',
            ],
            [
            'country.required' => 'This field is required',
            'continent.required' => 'This field is required',
            ]
        );

        $insert= new Country;
        $insert->name=$request->input('country');
        $insert->continent_id =$request->input('continent');
        $save= $insert->save();


        if($save)
        {
           return redirect(route('admin.countries'))->with('success','Details Saved Successfully !');
        }
       else
        {
        return redirect()->back()->with('Fail','Something Went Wrong');
         }

    }
    public function country_change_status($id, $status)
    {
        $country = Country::find($id);
        $country->status = $status == 1 ? 0 : 1;
        $country->save();

        return redirect()->back()->with('success', 'Country status updated.');
    }
     public function countryt_destroy($id)
    {
        $del=Country::where('id',$id)->delete();

        if($del)
        {
            return redirect(route('admin.countries'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
    public function country_by_continent(Request $request)
    {
        $id=$request->input('id');

        $countries=Country::where('continent_id',$id)->select('id','name')->get();



        echo json_encode($countries);
    }
}
