<?php

namespace App\Http\Controllers\Home;

use DateTime;
use DateTimeZone;
use App\Models\Cart;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
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
        Cart::create($data);
        return redirect()->route('cart');
    }

    public function wisata()
    {
        $wisata = Product::all();
        return view('wisata', compact('wisata'));
    }

    public function gallery_wisata()
    {
        $article = Article::all();
        return view('gallery', compact('article'));
    }
}
