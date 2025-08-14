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
    public function continent_change_status($code, $status)
    {
        $continent = Continent::where('code',$code)->first();
        $continent->status = $status == 1 ? 0 : 1;
        $continent->save();

        return redirect()->back()->with('success', 'Continent status updated.');
    }
    public function countries()
    {
        $countries = Country::get();
        return view('admin.countries',compact('countries'));
    }
    public function country_change_status($id, $status)
    {
        $country = Country::find($id);
        $country->status = $status == 1 ? 0 : 1;
        $country->save();

        return redirect()->back()->with('success', 'Country status updated.');
    }
    public function country_by_continent(Request $request)
    {
        $id=$request->input('id');

        $countries=Country::where('continent_id',$id)->select('id','name')->get();



        echo json_encode($countries);
    }
}
