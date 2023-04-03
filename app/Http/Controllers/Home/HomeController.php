<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Testimoni;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function get_home(Request $request)
    {   
        $article = DB::table('articles')->get();
        $products = DB::table('products')->where("category_id", 1)->get();
        $product = DB::table('products')->where("category_id", 2)->get();
        $users = DB::table('users')->where(Auth::user());
        $testimonis = DB::table('testimoni')->get();
        
        // dd($testimonis);
        return view('welcome', compact('article', 'product', 'products', 'users', 'testimonis'));
    }


    public function get_detail($slug)
    {
        $article = Article::with('gallery')->where('slug', $slug)->first();
        $gallery = Gallery::where('article_id', $article->id)->get();
        return view('detail', compact('article', 'gallery'));
    }

    public function testimoni(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'isi' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        
        Testimoni::create([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'isi' => $request->input('isi')
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }
}
