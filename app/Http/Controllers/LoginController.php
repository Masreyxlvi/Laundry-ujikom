<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $login =$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // dd('Login Berhasil');

        if(Auth::attempt($login))
        {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Login Failed!');
    }

    
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
