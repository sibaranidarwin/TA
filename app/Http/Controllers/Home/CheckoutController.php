<?php

namespace App\Http\Controllers\Home;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Transaction;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function proccess(Request $request)
    {
        $code = "Wisata-" . mt_rand(000, 999);
        $carts = Cart::select('products.id', 'products.harga')
            ->leftJoin('products', 'carts.product_id', '=', 'products.id')
            ->where('user_id', Auth::user()->id)
            ->get();
        $tgl_wisata = $request->tgl_wisata;
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total_harga' => (int) $request->total_harga,
            'status' => 'PENDING',
            'kode' => $code,
            'tgl_wisata' => $tgl_wisata,
        ]);

        foreach ($carts as  $item) {
            $trx = "TRS-" . mt_rand(000, 999);

          $coba = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item->id,
                'harga' => (int) $item->harga,
                'kode_transaksi' => $trx,
                'tgl_wisata' => $tgl_wisata,
            ]);
        }


        Cart::where('user_id', Auth::user()->id)->delete();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-jk6v6RjBITkkZR2Nisu3AV3h';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = env('MIDTRANS_ID_3DS');

        // buat array midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int)  $request->total_harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email
            ],
            'enabled_payments' => [
                'gopay', 'bni_va', 'bank_transfer', 'bri_va'
            ],
            'vtweb' => []
        ];
        try {

            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function callback()
    {
        $notification = new \Midtrans\Notification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrfail($order_id);


        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 'PENDING';
                } else {
                    $transaction->status = 'SUCCESS';
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        } else if ($status == 'pending') {
            $transaction->status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();
    }
}
