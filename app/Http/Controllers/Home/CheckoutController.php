<?php

namespace App\Http\Controllers\Home;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Exception;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function proccess(Request $request)
    {

        //proses checkout
        $code = "RENTAL-" . mt_rand(000, 999);
        $carts = DB::table('carts')
            ->leftJoin('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('users', 'carts.user_id', '=', 'users.id')
            ->select('products.id', 'products.harga')
            ->where('user_id', Auth::user()->id)
            ->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total_harga' => (int) $request->total_harga,
            'status' => 'PENDING',
            'kode' => $code,
            'start_date' => $request->input('start_date')
        ]);


        foreach ($carts as  $item) {
            $trx = "TRS-" . mt_rand(000, 999);

            DB::table('transaction_details')->insert([
                'transaction_id' => $transaction->id,
                'product_id' => $item->id,
                'price_id' => (int) $item->harga,
                'kode_transaksi' => $trx,
            ]);
        }

        DB::table('carts')->where('user_id', Auth::user()->id)->delete();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-bSc8R5EPgW-ZFsIgtVdRBupi';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

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
            // Get Snap Payment Page URL
            // $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            return redirect()->route('success');
            // header('Location: ' . $paymentUrl);
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
