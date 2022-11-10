<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = TransactionDetail::leftJoin('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->leftJoin('products', 'transaction_details.product_id', '=', 'products.id')
            ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->select(
                'transaction_details.*',
                'transactions.total_harga',
                'transactions.status',
                'users.name',
                'products.nama_produk',
            )
            ->get();
        return view('admin.pesanan.index', compact('detail'));
    }

    public function get_pesanan()
    {
        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.*', 'users.name')
            ->where('users.id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.pelanggan_pesanan.index', compact('transaction'));
    }

    public function saveTiket($id)
    {

        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.*', 'users.name')
            ->where('transactions.id', $id)
            ->orderBy('id', 'DESC')
            ->first();
        $img = Image::make(public_path('image/e-tiket.png'));
        $img->text(ucwords($transaction->name), 100, 205, function ($font) {
            $font->file('./font/Poppins-Bold.ttf');
            $font->size(27);
            $font->color('#000000');
            $font->align('center');
            $font->valign('bottom');
            // $font->angle(180);
        });
        $img->text('Rp. ' . $transaction->total_harga . '/org', 150, 330, function ($font) {
            $font->file('./font/Poppins-Medium.ttf');
            $font->size(24);
            $font->color('#000000');
            $font->align('center');
            $font->valign('bottom');
            // $font->angle(180);
        });
        // tanggal
        $img->text('Tanggal : ' . $transaction->tgl_wisata, 500, 330, function ($font) {
            $font->file('./font/Poppins-Medium.ttf');
            $font->size(18);
            $font->color('#000000');
            $font->align('center');
            $font->valign('bottom');
        });
        $fileName = 'Tiket_' . ucwords($transaction->name) . '_' . $transaction->tgl_wisata . '.jpg';
        $path = public_path('image_tiket/' . $fileName);
        $img->save($path);

        // header("Content-type:application/pdf");
        header('Content-Disposition: attachment; filename=' . $fileName);
        readfile(
            $path
        );

        return redirect()->back();
    }
}
