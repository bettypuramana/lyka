<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_enquirie;
use App\Models\Enquiry;
use App\Models\Visa_enquirie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $enquiries = Enquiry::join('countries', 'enquiries.destination', '=', 'countries.id')
                    ->select('enquiries.*', 'countries.name as country_name')->orderBy('enquiries.id', 'desc')->limit(10)->get();
        $packageenquirycount = Enquiry::count();
        $visaenquirycount = Visa_enquirie::count();
        $contactenquirycount = Contact_enquirie::count();
        $totalenquiry=$packageenquirycount+$visaenquirycount+$contactenquirycount;
        $packageenquirymonth = Enquiry::whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->count();

        $visaenquirymonth = Visa_enquirie::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        $contactenquirymonth = Contact_enquirie::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        return view('admin.dashboard',compact('enquiries','packageenquirycount','visaenquirycount','contactenquirycount','totalenquiry','packageenquirymonth','visaenquirymonth','contactenquirymonth'));
    }
}
