<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


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

            // dd($detail);
        return view('admin.pesanan.index', compact('detail'));
    }

    public function get_pesanan()
    {
        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.*', 'transactions.tgl_wisata as tanggal_wisata', 'users.name')
            ->where('users.id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.pelanggan_pesanan.index', compact('transaction'));
    }

    public function saveTiket(Request $request, $id)
    {

        $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.*', 'transactions.tgl_wisata as tanggal_wisata', 'users.name')
            ->where('transactions.id', $id)
            ->orderBy('id', 'DESC')
            ->first();
        switch (auth()->user()->role) {
            case 'wisatawan':
                $img = Image::make(public_path('image/e-tiket-wisata.png'));
                $img->text(ucwords($transaction->name), 550, 520, function ($font) {
                    $font->file(public_path('font/Poppins-Bold.ttf'));
                    $font->size(28);
                    $font->color('#FFFFFF');
                    $font->align('center');
                    $font->valign('bottom');
                    // $font->angle(180);
                });
                $img->text('Rp. ' . $transaction->total_harga . '/org', 550, 580, function ($font) {
                    $font->file(public_path('font/Poppins-Medium.ttf'));
                    $font->size(26);
                    $font->color('#FFFFFF');
                    $font->align('center');
                    $font->valign('bottom');
                    // $font->angle(180);
                });
                // tanggal
                $img->text('Tanggal : ' . $transaction->tanggal_wisata, 550, 620, function ($font) {
                    $font->file(public_path('font/Poppins-Medium.ttf'));
                    $font->size(20);
                    $font->color('#FFFFFF');
                    $font->align('center');
                    $font->valign('bottom');
                });
                break;

            default:
                $img = Image::make(public_path('image/e-tiket-umkm.png'));
                // $img->text(ucwords($transaction->name), 400, 205, function ($font) {
                //     $font->file(public_path('font/Poppins-Bold.ttf'));
                //     $font->size(27);
                //     $font->color('#620A29');
                //     $font->align('center');
                //     $font->valign('bottom');
                //     // $font->angle(180);
                // });
                $img->text('Rp. ' . $transaction->total_harga . '/Bulan', 400, 200, function ($font) {
                    $font->file(public_path('font/Poppins-Bold.ttf'));
                    $font->size(24);
                    $font->color('#393653');
                    $font->align('center');
                    $font->valign('bottom');
                    // $font->angle(180);
                });
                // tanggal
                $img->text($transaction->tanggal_wisata, 400, 255, function ($font) {
                    $font->file(public_path('font/Poppins-Medium.ttf'));
                    $font->size(17);
                    $font->color('#393653');
                    $font->align('center');
                    $font->valign('bottom');
                });
                break;
        }
        $fileName = 'Tiket_' . ucwords($transaction->name) . '_' . $transaction->tgl_wisata . '_' . time() . '.jpg';
        $path = 'image_tiket/' . $fileName;
        $img->save(public_path($path));
        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename="' . basename($url) . '"');
        // header('Expires: 0');
        // header('Cache-Control: must-revalidate');
        // header('Pragma: public');
        // header('Content-Length: ' . filesize($url));
        // flush();
        // readfile($url);
        header('Content-Type: application/x-file-to-save');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($path) . "\"");
        ob_end_clean();
        readfile($path);
        return redirect()->back();
    }
}
