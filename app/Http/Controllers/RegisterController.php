<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max::255',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|max:50',
            'password' => 'required|min:8|max::255'
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/user')->with(['success' => 'Registration Successfull, Please Login']);
    }
}
