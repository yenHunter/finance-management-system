<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard_view()
    {
        return view('pages.landing');
    }
}
