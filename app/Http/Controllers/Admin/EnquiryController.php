<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function package_enquiries()
    {
        return view('admin.enquiry_package');
    }
    public function visa_enquiries()
    {
        return view('admin.enquiry_visa');
    }
    public function contact_enquiries()
    {
        return view('admin.enquiry_contact');
    }
}
