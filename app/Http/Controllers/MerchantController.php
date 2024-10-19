<?php 

// app/Http/Controllers/MerchantController.php
namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function profile()
    {
        // Ambil data pengguna yang sedang login
        $merchant = Auth::user();

        // Pastikan bahwa merchant tidak null
        if (!$merchant) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        return view('merchant.profile', compact('merchant'));
    }


   // app/Http/Controllers/MerchantController.php

public function showProfile()
{
    // Mendapatkan data merchant yang terkait dengan pengguna yang sedang login
    $merchant = Merchant::where('user_id', Auth::id())->first();

    // Pastikan ada data merchant sebelum mengembalikan view
    if (!$merchant) {
        // Jika tidak ada, bisa redirect atau menampilkan pesan error
        return redirect()->route('merchant.menu')->with('error', 'Profile not found.');
    }

    return view('merchant.profile', compact('merchant'));
}


 public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Mencari merchant berdasarkan user_id
        $merchant = Merchant::where('user_id', Auth::id())->first();

        // Pastikan merchant ditemukan
        if (!$merchant) {
            return redirect()->back()->with('error', 'Merchant not found.');
        }

        // Mengupdate informasi merchant
        $merchant->update($request->only('company_name', 'description', 'address', 'phone'));

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function showMenu()
    {
        $menus = Menu::where('merchant_id', Auth::id())->get();
        return view('merchant.menu', compact('menus'));
    }

  public function createMenu(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'image|nullable|max:1999',
    ]);

    // Ambil merchant ID
    $merchant = Auth::user()->merchant;

    if (!$merchant) {
        return redirect()->back()->with('error', 'Merchant profile not found.'); // Jika tidak ada merchant
    }

    if ($request->hasFile('image')) {
        $fileNameToStore = $request->file('image')->store('images', 'public');
    } else {
        $fileNameToStore = null; // Tidak ada gambar
    }

    Menu::create([
        'merchant_id' => $merchant->id, // Gunakan ID merchant yang valid
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $fileNameToStore,
    ]);

    return redirect()->back()->with('success', 'Menu created successfully.');
}


public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully.');
    }

    public function showOrders()
{
    // Ambil semua order yang berkaitan dengan merchant yang sedang login
    $merchantId = Auth::id();
    $orders = Order::All();
    // Kembali ke tampilan dengan data yang telah diambil
    return view('merchant.orders', compact('orders'));
}

}
