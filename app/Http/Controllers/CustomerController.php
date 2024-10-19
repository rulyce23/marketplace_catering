<?php 

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function search()
    {
        $menus = Menu::all(); // Mungkin bisa dikembangkan lebih lanjut
        return view('customer.search', compact('menus'));
    }
}

