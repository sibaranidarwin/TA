<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::with('category')->latest()->get();
        $kategori = Category::latest()->get();

        return view('admin.article.index', compact('artikel', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'max:2048|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        // dd($request->file('gambar'));
        if (!empty($request->file('gambar'))) {
            $image = $request->file('gambar');
            $image->storeAs('public/blog', $image->hashName());
            Article::create([
                'category_id' => $request->input('category_id'),
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-'),
                'gambar' =>  $image->hashName(),
            ]);
        } else {
            Article::create([
                'category_id' => $request->input('category_id'),
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-'),
            ]);
        }
        return redirect()->route('article.index')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $artikel = Article::findOrFail($id);
        if (!empty($request->file('gambar'))) {
            $image = $request->file('gambar');
            $image->storeAs('public/blog', $image->hashName());
            $artikel->update([
                'category_id' => $request->input('category_id'),
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-'),
                'gambar' => $image->hashName(),
            ]);
        } else {
            $artikel->update([
                'category_id' => $request->input('category_id'),
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-')
            ]);
        }

        return redirect()->route('article.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
