<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_enquirie;
use App\Models\Enquiry;
use App\Models\Visa_enquirie;
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
        $visa_enquiries = Visa_enquirie::join('countries as nation', 'visa_enquiries.nationality_id', '=', 'nation.id')
                    ->join('countries as destination', 'visa_enquiries.travel_to', '=', 'destination.id')
                    ->select('visa_enquiries.*', 'nation.name as nation_name', 'destination.name as destination_name')
                    ->orderBy('visa_enquiries.id', 'desc')->get();
        return view('admin.enquiry_visa',compact('visa_enquiries'));
    }
    public function contact_enquiries()
    {
        $contact_enquiries = Contact_enquirie::orderBy('id', 'desc')->get();

        return view('admin.enquiry_contact',compact('contact_enquiries'));
    }
}
