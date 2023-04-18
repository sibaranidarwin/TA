<?php

namespace App\Http\Controllers\Home;

use DateTime;
use DateTimeZone;
use App\Models\Cart;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PacketDestinationController extends Controller
{
    public function get_wisata()
    {
        $kategori = Category::orderBy('nama_kategori', 'ASC')->get();
        $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $end_date = $date->format('Y-m-d');
        return view('form-register', compact('kategori'));
    }

    public function add(Request $request, $id)
    {
        $data = [
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
        ];

        // dd($data);
        Cart::create($data);

        return redirect()->route('cart');
    }

    public function wisata()
    {
        // $wisata = Product::all();
        $wisata = DB::table('products')->where("category_id", 1)->get();

        // where('category_id', Auth::user()->role)->get();
        return view('wisata', compact('wisata'));
    }

    public function event()
    {
        $wisata = Product::where("category_id", 2)->where("tgl_event", ">=" , now())->get();

        // where('category_id', Auth::user()->role)->get();
        return view('event', compact('wisata'));
    }

    public function gallery_wisata()
    {
        $article = Article::all();
        return view('gallery', compact('article'));
    }
}
