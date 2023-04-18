<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = Cart::Join('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('users', 'carts.user_id', '=', 'users.id')
            ->select(
                'carts.id',
                'carts.anak',
                'carts.dewasa',
                'carts.tgl_wisata',
                'carts.total_harga',
                'products.nama_produk',
                'products.harga',
                'products.harga_anak'

            )
            ->where('user_id', Auth::user()->id)
            ->first();

        $tanggal = $request->input('tanggal');
        $name = Auth::user()->name;
        $no_hp = Auth::user()->no_hp;
        $email = Auth::user()->email;
        
        // dd($carts);
        return view('cart', compact('carts', 'name', 'no_hp', 'name', 'email', 'tanggal'));
    }

    public function add(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => '',
            'user_id' => '',
            'tgl_wisata' => 'required',
            'anak' => '',
            'dewasa' => '',
            'total_harga' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', 'Data Tidak berhasil dipesan!');
        }

        $data = [
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'tgl_wisata' => $request->tgl_wisata,
            'anak' => $request->anak,
            'dewasa' => $request->dewasa,
            'total_harga' => $request->total_harga
        ];

        // dd($data);
        Cart::create($data);

        return redirect()->route('cart');
    }

    public function cancel_booking($id)
    {
        $data = Cart::find($id);
        $data->delete();

        return response()->json ($data);
    }

    public function formtiket(Request $request, $id){
        $detail = Product::find($id);
        $formtikets = Cart::select(
            'carts.id',
            'products.nama_produk',
            'products.harga',
            'products.harga_anak',
        )
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->leftJoin('users', 'carts.user_id', '=', 'users.id')
        ->where('user_id', Auth::user()->id)
        ->get();
    // dd($formtikets);
    // $article = DB::table('articles')->get();
    $product = DB::table('products')->where("id", "=", "$detail->id")->get();
    
    // dd($product->category_id);
    $tanggal = $request->input('tanggal');
    $name = Auth::user()->name;
    $no_hp = Auth::user()->no_hp;
    $email = Auth::user()->email;
    // dd($product);

    return view('formtiket', compact('formtikets', 'name', 'no_hp', 'name', 'email', 'tanggal', 'product'));
    }
}