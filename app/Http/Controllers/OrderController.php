<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date'
        ]);

        // Temukan menu berdasarkan menu_id
        $menu = Menu::findOrFail($request->menu_id);

        // Hitung total harga
        $totalPrice = $menu->price * $request->quantity;

        // Buat order baru
        Order::create([
            'menu_id' => $menu->id,
            'customer_id' => Auth::id(),
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
            'total_price' => $totalPrice,
            'merchant_id' => $menu->merchant_id, // Menyimpan merchant_id saat order dibuat
        ]);
        
        return redirect()->back()->with('success', 'Order placed successfully.');
    }

    public function showCustomerOrders()
    {
        $orders = Order::where('customer_id', Auth::id())->get();
        return view('customer.order', compact('orders'));
    }
}
