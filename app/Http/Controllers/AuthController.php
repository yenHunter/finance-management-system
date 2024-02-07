<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function recovery_view()
    {
        return view('auth.recovery');
    }

    public function login(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // User login
        if (Auth::attempt($request->only('email', 'password'))) {
            Session::put('user', User::where('email', $request->email)->get()->first());
            return redirect('dashboard');
        }

        return redirect('login')->withErrors('Error');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        // Save user info in DB
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_picture' => 'assets/dist/img/profile.png'
        ]);

        // Login user 
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('dashboard');
        }
        return redirect('register')->withErrors('Error');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
