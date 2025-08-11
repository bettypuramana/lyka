<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subscriptions = Subscription::get();
        return view('admin.subscriptions',compact('subscriptions'));
    }
    public function destroy($id)
    {
        $del=Subscription::where('id',$id)->delete();

        if($del)
        {
            return redirect(route('admin.subscriptions'))->with('success','Deleted Successfully !');
        }
        else
        {
            return redirect()->back()->with('Fail','Something Went Wrong');
        }
    }
}
