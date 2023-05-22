<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    

    public function index()
    {
        return view('auth.index');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');

            }elseif (Auth::user()->role === 'tentor') {
                return redirect()->route('tentor.dashboard');

            } else {
                return redirect()->intended('/');
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'email or password is invalid']);
    }


        public function logout()
        {
            Auth::logout();

            return redirect('/');
        }
}
