<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function dashboard_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', '');
            Session::put('active', 'dashboard');
            return view('pages.landing');
        } else {
            return redirect('login')->withErrors('Error');
        }
    }
}
