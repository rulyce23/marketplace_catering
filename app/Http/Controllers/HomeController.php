<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Cek peran pengguna yang sedang login
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
                return redirect()->route('customer.search'); // Redirect ke portal customer
            } elseif (Auth::user()->role == 'merchant') {
                return redirect()->route('merchant.profile'); // Redirect ke portal merchant
            }
        }

        // Jika tidak ada pengguna yang login, redirect ke halaman login
        return redirect()->route('login');
    }
}
