<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->get();
        $category = Category::all();

        return view('admin.produk_rental.index', compact('product', 'category'));
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
            'nama_produk' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
            'id_kategori' => 'required',
            'total_kursi' => 'required',
            'jam_rental' => 'required',
            'tipe_rental' => 'required',
            'tipe_driver' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $image = $request->file('gambar');
        $image->storeAs('public/products', $image->hashName());
        DB::table('products')->insert([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
            'gambar' => $image->hashName(),
            'id_kategori' => $request->input('id_kategori'),
            'total_kursi' => $request->input('total_kursi'),
            'jam_rental' => $request->input('jam_rental'),
            'tipe_rental' => $request->input('tipe_rental'),
            'tipe_driver' => $request->input('tipe_driver')
        ]);

        return redirect()->route('product.index')->with('toast_success', 'Data berhasil disimpan!');
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
            'nama_produk' => 'required',
            'harga' => 'required',
            // 'gambar' => 'required',
            'id_kategori' => 'required',
            'total_kursi' => 'required',
            'jam_rental' => 'required',
            'tipe_rental' => 'required',
            'tipe_driver' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        if (!empty($request->file('gambar'))) {
            $image = $request->file('gambar');
            $image->storeAs('public/products', $image->hashName());
            DB::table('products')->where('id', $id)->update([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
                'gambar' => $image->hashName(),
                'id_kategori' => $request->input('id_kategori'),
                'total_kursi' => $request->input('total_kursi'),
                'jam_rental' => $request->input('jam_rental'),
                'tipe_rental' => $request->input('tipe_rental'),
                'tipe_driver' => $request->input('tipe_driver')
            ]);
        } else {
            DB::table('products')->where('id', $id)->update([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
                'id_kategori' => $request->input('id_kategori'),
                'total_kursi' => $request->input('total_kursi'),
                'jam_rental' => $request->input('jam_rental'),
                'tipe_rental' => $request->input('tipe_rental'),
                'tipe_driver' => $request->input('tipe_driver')
            ]);
        }

        return back()->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
