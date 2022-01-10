<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalMobilController extends Controller
{

    public function get_mobil()
    {
        $kategori = Category::orderBy('nama_kategori', 'ASC')->get();
        return view('form-register', compact('kategori'));
    }

    public function cari_mobil(Request $request)
    {
        // dd($request->all());
        $tanggal = $request->input('tanggal');
        $jam = $request->input('jam_rental');
        $id_kategori = $request->input('id_kategori');
        $tipe_rental = $request->input('tipe_rental');
        $tipe_driver = $request->input('tipe_driver');
        $mobil = DB::table('products')
            ->where('jam_rental', 'LIKE', '%' . $jam . '%')
            ->orWhere('id_kategori', 'LIKE', '%' . $id_kategori . '%')
            ->orWhere('tipe_rental', 'LIKE', '%' . $tipe_rental . '%')
            ->orWhere('tipe_driver', 'LIKE', '%' . $tipe_driver . '%')
            ->get();
        // dd($mobil);

        return view('list-mobil', compact('mobil', 'jam', 'id_kategori', 'tipe_rental', 'tipe_driver', 'tanggal'));
    }

    public function add(Request $request, $id)
    {
        $data = $request->all();
        $data = [
            'product_id' => $id,
            'user_id' => Auth::user()->id,
            'start_date' => $request->tanggal,
        ];

        DB::table('carts')->insert($data);

        return redirect()->route('cart');
    }
}
