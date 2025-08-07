<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }
    public function about()
    {
        return view('user.about');
    }
    public function blog_details()
    {
        return view('user.blog_details');
    }
    public function blogs()
    {
        return view('user.blogs');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function gallery()
    {
        return view('user.gallery');
    }
    public function package_details()
    {
        return view('user.package_details');
    }
    public function packages()
    {
        return view('user.packages');
    }
    public function privacy_policy()
    {
        return view('user.privacy_policy');
    }
    public function terms_and_conditions()
    {
        return view('user.terms_and_conditions');
    }
    public function visa()
    {
        return view('user.visa');
    }
     public function visa_details()
    {
        return view('user.visa_details');
    }
}