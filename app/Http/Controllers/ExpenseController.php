<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    public function expense_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_list');
            return view('pages.expense.list');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function expense_create_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_create');
            return view('pages.expense.create');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function expense_head_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'expense');
            Session::put('active', 'expense_head');
            return view('pages.expense.head');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
