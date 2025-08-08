<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
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
        return view('admin.packages');
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

    }
}
