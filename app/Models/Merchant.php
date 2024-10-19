<?php

// app/Models/Merchant.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'description', 'address', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function menus()
{
    return $this->hasMany(Menu::class);
}

}
