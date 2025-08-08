<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function banners()
    {
        return view('admin.banners');
    }
    public function gallery()
    {
        return view('admin.gallery');
    }
    public function contact_settings()
    {
        return view('admin.settings_contact');
    }
    public function aboutus_settings()
    {
        return view('admin.settings_aboutus');
    }
    public function socialmedialinks_settings()
    {
        return view('admin.settings_socialmedialinks');
    }
}
