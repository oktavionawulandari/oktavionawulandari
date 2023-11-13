<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else{
            return view('user.login');
        }
    }

    public function action_login(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('dashboard');
        } else{
            return redirect('/user')->with('error', 'Username atau Password Salah!');
        }
    }

    public function action_logout()
    {
        Auth::logout();
        return redirect('/user');
    }
}
