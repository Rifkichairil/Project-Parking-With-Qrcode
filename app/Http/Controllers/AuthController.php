<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {

            if (Auth::user()->role == 'operator') {
                return redirect('/dashboard-operator');
            }
            return redirect('/users');
        }
        return redirect('/login');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
