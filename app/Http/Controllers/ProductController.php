<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $product = Product::latest()->get();
        $category = Category::all();

        return view('admin.produk.index', compact('product', 'category'));
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
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required',
            'file_gambar' => 'required',
            'category_id' => 'required|exists:categories,id',
            'link_maps' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $image = $request->file('file_gambar');
        $image->storeAs('public/products', $image->hashName());
        Product::create([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
            'gambar' => $image->hashName(),
            'category_id' => $request->input('category_id'),
            'link_maps' => $request->input('link_maps'),
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
            'category_id' => 'required',
            'link_maps' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $product = Product::findOrFail($id);
        if (!empty($request->hasFile('file_gambar'))) {
            $image = $request->file('file_gambar');
            $image->storeAs('public/product', $image->hashName());
            $product->update([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
                'gambar' => $image->hashName(),
                'category_id' => $request->input('category_id'),
                'link_maps' => $request->input('link_m aps'),
            ]);
        } else {
            $product->update([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
                'category_id' => $request->input('category_id'),
                'link_maps' => $request->input('link_maps'),
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
        $product = Product::find($id);

        if (is_null($product)) {
            return back()->with('toast_error', 'Data tidak ada');
        }
        $product->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
