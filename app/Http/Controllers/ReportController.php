<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}
