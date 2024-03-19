<?php

namespace App\Http\Controllers;

use App\Models\IncomeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function dashboard_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', '');
            Session::put('active', 'dashboard');
            return view(
                'pages.landing',
                [
                    'fdr_schedule' => IncomeDetails::join('bank_infos', 'income_details.bank_id', '=', 'bank_infos.id')
                        ->join('branch_infos', 'income_details.branch_id', '=', 'branch_infos.id')
                        ->join('financial_years', 'income_details.financial_year', '=', 'financial_years.id')
                        ->select('income_details.*', 'financial_years.value', 'bank_infos.bank_name', 'bank_infos.logo', 'branch_infos.branch_name')
                        ->where('financial_years.value', '=', date('Y') - 1 . '-' . date('y'))
                        ->where('income_details.income_head', '=', 1)
                        ->orderBy('income_details.maturity_date', 'desc')
                        ->limit(6)->get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
