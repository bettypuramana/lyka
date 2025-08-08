<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $shop_id = Auth::user()->id;

        return view('admin.package_add');
    }
    public function store(Request $request)
    {

    }
}
