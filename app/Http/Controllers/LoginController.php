<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('pegawai.login');
    }

    public function loginlogic(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/');
        }
        return view('pegawai.login');
    }

    public function register()
    {
        return view('pegawai.register');
    }

    public function registeruser(Request $request)
    {
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'remember_token' => Str::random(60)
        // ]);

        dd($request->all());

        // return redirect('/login');
    }
}
