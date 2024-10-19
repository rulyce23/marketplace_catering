<?php 

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // app/Http/Controllers/Auth/LoginController.php

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Jika login berhasil, redirect ke halaman home yang sesuai
        return redirect()->route('home')->with('success', 'Login successful! Welcome back!');
    }

    // Jika login gagal, redirect kembali dengan pesan error
    return redirect()->back()->with('error', 'Invalid credentials, please try again.');
}

// app/Http/Controllers/Auth/LoginController.php

public function logout(Request $request)
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have logged out successfully.');
}

}

