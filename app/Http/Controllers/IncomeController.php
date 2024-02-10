<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
{
    public function income_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'income_list');
            return view('pages.income.list');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function income_create_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'income_create');
            return view('pages.income.create');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function bank_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'income');
            Session::put('active', 'bank_list');
            return view('pages.income.bank');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
