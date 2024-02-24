<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class UserController extends Controller
{
    public function user_list_view()
    {
        if (Session::get('user') != null) {
            Session::put('open', 'user');
            Session::put('active', 'user_list');
            return view(
                'pages.user.list',
                [
                    'user_list' => User::get()
                ]
            );
        } else {
            return redirect('login')->withErrors('Error');
        }
    }

    public function genPDF() 
    {
        $data = [[
            'particulars'  => 'Interest Income from FDR',
            'notes'        => 'Test Notes',
            'currentYear'  => '100',
            'previousYear' => '400'
        ],
        [
            'particulars'  => 'Interest Income from FDR',
            'notes'        => 'Test Notes',
            'currentYear'  => '200',
            'previousYear' => '300'
        ]
        ];
        $pdf = PDF::loadView('generatePDF', ['data' => $data]);
        return $pdf->stream('resume.pdf');
    }
}
