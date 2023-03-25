<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Model\Product;

class HomeController extends Controller
{
    public function get_home()
    {
        $article = DB::table('articles')->get();
        $product = DB::table('products')->get();
        // dd($product);
        return view('welcome', compact('article', 'product'));
    }


    public function get_detail($slug)
    {
        $article = Article::with('gallery')->where('slug', $slug)->first();
        $gallery = Gallery::where('article_id', $article->id)->get();
        return view('detail', compact('article', 'gallery'));
    }
}
