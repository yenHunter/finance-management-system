<?php

namespace App\Http\Controllers;

use App\Models\IncomeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF as PDF;

class ReportController extends Controller
{
    public function report_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', '');
            Session::put('active', 'report');
            return view('pages.report.list');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function balance_sheet_report()
    {
        if (Session::get('user') != null) {
            $income_details = IncomeDetails::join('income_details', 'income_details.income_head', '=', 'income_heads.id')
                ->join('income_details.bank_id', '=', 'bank_infos.id')
                ->join('income_details.branch_id', '=', 'branch_infos.id')
                ->select('income_details.*', 'income_heads.head_name', 'bank_infos.bank_name', 'branch_infos.branch_name');
            // dd($income_details);
            PDF::SetTitle('Hello World');
            PDF::SetFont('helvetica', '', 9);
            PDF::AddPage();
            $html = view('pages.report.balance_sheet')->render();
            PDF::writeHTML($html, true, false, true, false, '');
            PDF::Output('hello_world.pdf');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    // public function displayReport()
    // {
    //     // $fromDate = $request->input('from_date');
    //     // $toDate = $request->input('to_date');
    //     // $sortBy = $request->input('sort_by');

    //     $title = 'Registered User Report'; // Report title

    //     $meta = [ // For displaying filters description on header
    //         // 'Registered on' => $fromDate . ' To ' . $toDate,
    //         // 'Sort By' => $sortBy
    //     ];

    //     $queryBuilder = User::select(['name', 'email']); // Do some querying..
    //                         // ->whereBetween('registered_at', [$fromDate, $toDate])
    //                         // ->orderBy($sortBy);

    //     $columns = [ // Set Column to be displayed
    //         'Name' => 'name',
    //         'Email' // if no column_name specified, this will automatically search for snake_case of column name (will be registered_at) column from query result
    //         // 'Total Balance' => 'balance',
    //         // 'Status' => function($result) { // You can do if statement or any action do you want inside this closure
    //         //     return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
    //         // }
    //     ];

    //     // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
    //     return PdfReport::of($title, $meta, $queryBuilder, $columns)
    //                     ->editColumn('Registered At', [ // Change column class or manipulate its data for displaying to report
    //                         'displayAs' => function($result) {
    //                             return $result->registered_at->format('d M Y');
    //                         },
    //                         'class' => 'left'
    //                     ])
    //                     // ->editColumns(['Total Balance', 'Status'], [ // Mass edit column
    //                     //     'class' => 'right bold'
    //                     // ])
    //                     // ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
    //                     //     'Total Balance' => 'point' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
    //                     // ])
    //                     ->limit(20) // Limit record to be showed
    //                     ->download("TestReport.pdf"); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    // }


}
