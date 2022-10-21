<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = Cart::leftJoin('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('users', 'carts.user_id', '=', 'users.id')
            ->select(
                'carts.id',
                'products.nama_produk',
                'products.harga',
            )
            ->where('user_id', Auth::user()->id)
            ->first();
        $tanggal = $request->input('tanggal');
        $name = Auth::user()->name;
        $no_hp = Auth::user()->no_hp;
        $email = Auth::user()->email;

        return view('cart', compact('carts', 'name', 'no_hp', 'name', 'email', 'tanggal'));
    }

    public function cancel_booking($id)
    {
        $data = Cart::find($id);
        $data->delete();

        return response()->json($data);
    }
}
