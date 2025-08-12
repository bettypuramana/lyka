<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    public function export()
    {
        $subscriptions = Subscription::select('email', 'created_at')->get();

        // Create spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headings
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Created Date');

        // Add data
        $row = 2;
        foreach ($subscriptions as $index => $sub) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $sub->email);
            $sheet->setCellValue('C' . $row, $sub->created_at->format('Y-m-d'));
            $row++;
        }

        // Create file
        $writer = new Xlsx($spreadsheet);

        // Output to browser
        $fileName = 'subscriptions.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
