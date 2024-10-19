<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'merchant_id',
        'customer_id',
        'menu_id',
        'quantity',
        'status',
        'total_price',
        'delivery_date',
        'total_price', // Jika Anda ingin menyimpan total harga di DB
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id'); // Jika customer adalah pengguna
    }
}

