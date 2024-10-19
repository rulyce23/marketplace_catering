<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Merchant; // Pastikan model Merchant diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data dari request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:customer,merchant', // Tambahkan validasi untuk role
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Jika role adalah merchant, buat record di tabel merchants
        if ($request->role === 'merchant') {
            Merchant::create([
                'user_id' => $user->id, // Ambil ID dari user yang baru dibuat
                'company_name'=>  $user->name,
                'description'=> null,
            ]);
        }

        // Login pengguna setelah registrasi
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful! Welcome!');
    }
}
