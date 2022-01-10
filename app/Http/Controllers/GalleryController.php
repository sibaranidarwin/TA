<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = DB::table('galleries')
            ->leftJoin('articles', 'galleries.artikel_id', '=', 'articles.id')
            ->get();
        $artikel = DB::table('articles')->get();
        return view('admin.gallery.index', compact('gallery', 'artikel'));
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
        $validator = Validator::make($request->all(), [
            'artikel_id' => 'required',
            'file_gambar' => 'required',
            'is_default' => 'required'
        ]);


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $image = $request->file('file_gambar');
        $image->storeAs('public/wisata', $image->hashName());
        Gallery::create([
            'artikel_id' => $request->input('artikel_id'),
            'is_default' => $request->input('is_default'),
            'file_gambar' => $image->hashName(),
        ]);

        return redirect()->route('gallery.index')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            'artikel_id' => 'required',
            // 'file_gambar' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $gallery = Gallery::find($id);

        if (empty($request->file('file_gambar'))) {
            $gallery->update([
                'artikel_id' => $request->input('artikel_id'),
                'is_default' => $request->input('is_default'),
            ]);
        } else {
            $image = $request->file('file_gambar');
            $image->storeAs('public/wisata', $image->hashName());
            $image->update([
                'artikel_id' => $request->input('artikel_id'),
                'is_default' => $request->input('is_default'),
                'file_gambar' => $image->hashName(),
            ]);
        }

        return redirect()->route('gallery.index')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
