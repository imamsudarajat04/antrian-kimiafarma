<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/dashboard');
        }

        return back();
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        return redirect('/masuk');
    }
}
