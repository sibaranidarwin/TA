<?php

namespace App\Http\Controllers\Home;

use DateTime;
use DateTimeZone;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalMobilController extends Controller
{

    public function get_mobil()
    {
        $kategori = Category::orderBy('nama_kategori', 'ASC')->get();
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $end_date = $date->format('Y-m-d');
        DB::table('products')->whereDate('updated_at', $end_date)->update([
            'stock' => 1
        ]);
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
        // dd($set);
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $end_date = $date->format('Y-m-d');
        // dd($date);

        $mobil = Product::where('jam_rental', 'LIKE', '%' . $jam . '%')
            ->Where('id_kategori', 'LIKE', '%' . $id_kategori . '%')
            ->Where('tipe_rental', 'LIKE', '%' . $tipe_rental . '%')
            ->Where('tipe_driver', 'LIKE', '%' . $tipe_driver . '%')
            ->get();
        $transaction = TransactionDetail::where('created_at', '=', $end_date)->get();
        // dd($transaction);
        // $array =[];
        // foreach ($transaction as $t)
        // {
        //     $array[] = DB::table('products')->where('id', $t->product_id)->get();
        // }
        // // dd($array);


        // foreach ($transaction as $value) {
        // }
        // dd($mobil);

        return view('list-mobil', compact(
            'mobil',
            'jam',
            'id_kategori',
            'tipe_rental',
            'tipe_driver',
            'tanggal',
            // 'transaction',
            'end_date'
        ));
    }

    public function add(Request $request, $id)
    {
        $data = $request->all();
        $data = [
            'product_id' => $id,
            'user_id' => Auth::user()->id,
            'start_date' => $request->tanggal,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
