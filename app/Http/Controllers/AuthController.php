<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login To Your Account'
        ]);
    }

    public function authenticate(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('msg', [
            'status' => 'danger',
            'body' => '❌ Login Failed! Please Double Check Your Credentials Info'
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:rfc|unique:users',
            'password' => 'required|max:255|min:5'
        ]);

        $validatedData['UUID'] = (string) Str::uuid();
        $validatedData['password'] = bcrypt($validatedData['password']);

        \App\Models\User::create($validatedData);

        return redirect('login')->with('msg', [
            'status' => 'success',
            'body' => '✅ Register Success! Please Login Using Your Credentials'
        ]);
    }
}