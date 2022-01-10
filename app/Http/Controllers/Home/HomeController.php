<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function get_home()
    {
        $article = DB::table('articles')->get();

        return view('welcome', compact('article'));
    }


    public function get_detail($slug)
    {
        $article = DB::table('articles')->where('slug', $slug)->get();
        $gambar = Gallery::all();

        return view('detail', compact('article', 'gambar'));
    }
}
