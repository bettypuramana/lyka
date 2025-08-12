<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_enquirie;
use App\Models\Enquiry;
use App\Models\Visa_enquirie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public function changePasswordForm()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Please enter your current password.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'Password must be at least 6 characters.',
            'new_password.confirmed' => 'New password and confirmation do not match.',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout(); // logout user after change
        return redirect()->route('login')->with('success', 'Password changed successfully. Please login to continue.');
    }
}
