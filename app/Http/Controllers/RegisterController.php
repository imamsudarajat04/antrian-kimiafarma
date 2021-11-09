<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute Wajib diisi!',
            'min' => ':attribute Harus diisi minimal :min karakter!'
        ];

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
            'level' => ['required', 'string', 'max:255'],
        ], $message);

        $postData = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'level' => $request['level'],
                ]);

        return back()->with('success', 'Berhasil Register!');
    }
}
