<?php

namespace App\Http\Controllers;

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
        $artikel = DB::table('articles')->get();

        return view('admin.article.index', compact('artikel'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $image = $request->file('gambar');
        $image->storeAs('public/blog', $image->hashName());

        DB::table('articles')->insert([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'slug' => Str::slug($request->input('judul'), '-'),
            'gambar' => $image->hashName(),
        ]);

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
            // 'gambar' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        if (empty($request->file('gambar'))) {
            DB::table('articles')->where('id', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-'),
            ]);
        } else {
            $image = $request->file('gambar');
            $image->storeAs('public/blog', $image->hashName());

            DB::table('articles')->where('id', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => Str::slug($request->input('judul'), '-'),
                'gambar' => $image->hashName(),
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
        DB::table('articles')->where('id', $id)->delete();
        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
