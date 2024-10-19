<?php



// app/Http/Controllers/MenuController.php
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'required|image|max:2048', // Validasi gambar jika ada
    ]);

    // Pastikan merchant terhubung dengan ID yang sesuai
    $merchant = Merchant::where('user_id', Auth::id())->first();

    if (!$merchant) {
        return redirect()->back()->with('error', 'Merchant not found.'); // Pesan jika merchant tidak ada
    }

    // Menyimpan gambar
    $imagePath = $request->file('image')->store('images', 'public');

    // Membuat menu baru
    Menu::create([
        'merchant_id' => $merchant->id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
    ]);

    return redirect()->route('merchant.menus.index')->with('success', 'Menu added successfully.');
}
}