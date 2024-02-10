<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}
