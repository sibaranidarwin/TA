<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $request->tanggal;
        // dd($request->tanggal);
        $carts = DB::table('carts')
            ->leftJoin('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('users', 'carts.user_id', '=', 'users.id')
            ->select(
                'carts.id',
                'carts.start_date',
                'products.nama_produk',
                'products.harga',
                'products.jam_rental',
                'products.tipe_rental',
                'products.tipe_driver',
            )
            ->where('user_id', Auth::user()->id)
            ->get();
        // dd($carts);
        $tanggal = $request->input('tanggal');
        $name = Auth::user()->name;
        $no_hp = Auth::user()->no_hp;
        $email = Auth::user()->email;
        // dd($tanggal);
        return view('cart', compact('carts', 'name', 'no_hp', 'name', 'email', 'tanggal'));
    }

    public function cancel_booking($id)
    {
        $data = DB::table('carts')->where('id', $id)->delete();
        // dd($test);
        return response()->json($data);
    }
}
