<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeographyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function continents()
    {
        return view('admin.continents');
    }
    public function countries()
    {
        return view('admin.countries');
    }
}
