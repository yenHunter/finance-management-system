<?php

namespace App\Http\Controllers;

use App\Models\ExpenseInfo;
use App\Models\FinancialYear;
use App\Models\IncomeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF as PDF;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', '');
            Session::put('active', 'report');
            return view(
                'pages.report.list',
                [
                    'financial_year' => FinancialYear::orderBy('value', 'desc')->get(),
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function balance_sheet_report()
    {
        if (Session::get('user') != null) {
            $data['income_details'] = IncomeDetails::join('income_heads', 'income_details.income_head', '=', 'income_heads.id')
                ->select('income_heads.head_name AS income_head', DB::raw('SUM(CASE WHEN financial_year = 3 THEN amount ELSE 0 END) AS current_total_amount'), DB::raw('SUM(CASE WHEN financial_year = 2 THEN amount ELSE 0 END) AS previous_total_amount'))
                ->groupBy('income_heads.head_name')->get();
            $data['expense_details'] = ExpenseInfo::join('expense_heads', 'expense_infos.expense_head', '=', 'expense_heads.id')
                ->select('expense_heads.head_name AS expense_head', DB::raw('SUM(CASE WHEN financial_year = 3 THEN amount ELSE 0 END) AS current_total_amount'), DB::raw('SUM(CASE WHEN financial_year = 2 THEN amount ELSE 0 END) AS previous_total_amount'))
                ->groupBy('expense_heads.head_name')->get();
            // dd($data);
            PDF::SetTitle('Hello World');
            PDF::SetFont('helvetica', '', 9);
            PDF::AddPage();
            $html = view('pages.report.balance_sheet', $data)->render();
            PDF::writeHTML($html, true, false, true, false, '');
            PDF::Output('balance_sheet_report.pdf');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function fdr_schedule_report(Request $request)
    {
        if (Session::get('user') != null) {
            $data['fdr_schedule'] = IncomeDetails::join('bank_infos', 'income_details.bank_id', '=', 'bank_infos.id')
                ->join('branch_infos', 'income_details.branch_id', '=', 'branch_infos.id')
                ->select('income_details.*', 'bank_infos.bank_name', 'bank_infos.logo', 'branch_infos.branch_name')
                ->where('income_details.financial_year', '=', $request->financial_year)
                ->where('income_details.income_head', '=', 1)
                ->where('income_details.fund_type', '=', $request->fund_type)
                ->orderBy('income_details.maturity_date', 'desc')
                ->get();
            // dd($data);
            $data['fund_type'] = $request->fund_type;
            PDF::SetTitle('Hello World');
            PDF::SetFont('helvetica', '', 9);
            PDF::AddPage('L', 'A4');
            $html = view('pages.report.fdr_schedule', $data)->render();
            PDF::writeHTML($html, true, false, true, false, '');
            PDF::Output('fdr_schedule_report.pdf');
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
