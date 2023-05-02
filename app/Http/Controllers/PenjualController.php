<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Testimoni;
use App\Models\Transaction;
use App\Models\TransactionDetail;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Carbon\CarbonImmutable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenjualController extends Controller
{
    //
    public function dashboard()
    {
        $year = CarbonImmutable::now()->locale('id_ID')->format('Y');
        $date = \Carbon\Carbon::parse($year); // universal truth month's first day is 1
        $start = $date->startOfYear()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $end = $date->endOfYear()->format('Y-m-d H:i:s');

        $month4 = 4;
        $date = \Carbon\Carbon::parse($year."-".$month4."-01"); // universal truth month's first day is 1
        $startmonth4 = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $endmonth4 = $date->endOfMonth()->format('Y-m-d H:i:s');

        $month5 = 5;
        $date = \Carbon\Carbon::parse($year."-".$month5."-01"); // universal truth month's first day is 1
        $startmonth5 = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $endmonth5 = $date->endOfMonth()->format('Y-m-d H:i:s');

        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:i:s');
        $end_week = $now->endOfWeek()->format('Y-m-d H:i:s');

        $total_tahun =Transaction::whereBetween('tgl_wisata', [$start, $end])->where('status', 'success')->sum('total_harga');
        $total_bulan =Transaction::whereBetween('tgl_wisata', [$startmonth5, $endmonth5])->where('status', 'success')->sum('total_harga');
        $total_minggu =Transaction::whereBetween('created_at', [$start_week, $end_week])->where('status', 'success')->sum('total_harga');
        // dd($total_minggu);

        $total_tahun_wisata =Transaction::whereBetween('tgl_wisata', [$start, $end])->where('nama_tiket', 'Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
        $total_tahun_event =Transaction::whereBetween('tgl_wisata', [$start, $end])->where('nama_tiket', '!=','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');

        $total_bulan_wisata4 =Transaction::whereBetween('tgl_wisata', [$startmonth4, $endmonth4])->where('nama_tiket','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
        $total_bulan_event4 =Transaction::whereBetween('tgl_wisata', [$startmonth4, $endmonth4])->where('nama_tiket', '!=','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
        $total_bulan_wisata5 =Transaction::whereBetween('tgl_wisata', [$startmonth5, $endmonth5])->where('nama_tiket','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
        $total_bulan_event5 =Transaction::whereBetween('tgl_wisata', [$startmonth5, $endmonth5])->where('nama_tiket', '!=','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');

        $total_minggu_wisata =Transaction::whereBetween('created_at', [$start_week, $end_week])->where('nama_tiket', 'Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
        $total_minggu_event =Transaction::whereBetween('created_at', [$start_week, $end_week])->where('nama_tiket', '!=','Tiket Masuk kaldera')->where('status', 'success')->sum('total_harga');
       
        $startweek = $now->startOfWeek(Carbon::MONDAY)->format('d');
        $endweek = $now->endOfWeek()->format('d');

        return view('penjual.index', compact('total_tahun_wisata', 'total_tahun_event', 'total_minggu_wisata', 'total_minggu_event', 'total_tahun', 'total_bulan', 'total_minggu','total_bulan_wisata4','total_bulan_event4','total_bulan_wisata5', 'total_bulan_event5' ,'startweek', 'endweek'));
    }
}
