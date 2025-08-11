<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function package_enquiries()
    {
        $enquiries = Enquiry::join('countries', 'enquiries.destination', '=', 'countries.id')
                    ->select('enquiries.*', 'countries.name as country_name')->orderBy('enquiries.id', 'desc')->get();
        return view('admin.enquiry_package',compact('enquiries'));
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
