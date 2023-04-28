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

class PelangganController extends Controller
{
    //
    public function dashboard()
    {
        $year = CarbonImmutable::now()->locale('id_ID')->format('Y');
        $date = \Carbon\Carbon::parse($year); // universal truth month's first day is 1
        $start = $date->startOfYear()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $end = $date->endOfYear()->format('Y-m-d H:i:s');

        $month = 4;
        $date = \Carbon\Carbon::parse($year."-".$month."-01"); // universal truth month's first day is 1
        $startmonth = $date->startOfMonth()->format('Y-m-d H:i:s'); // 2000-02-01 00:00:00
        $endmonth = $date->endOfMonth()->format('Y-m-d H:i:s');

        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:i:s');
        $end_week = $now->endOfWeek()->format('Y-m-d H:i:s');

        $total_tahun =Transaction::whereBetween('tgl_wisata', [$start, $end])->sum('total_harga');
        $total_bulan =Transaction::whereBetween('tgl_wisata', [$startmonth, $endmonth])->sum('total_harga');
        $total_minggu =Transaction::whereBetween('tgl_wisata', [$start_week, $end_week])->sum('total_harga');
        // dd($total_bulan);

        $startweek = $now->startOfWeek(Carbon::MONDAY)->format('d');
        $endweek = $now->endOfWeek()->format('d');

        return view('dashboard', compact('total_tahun', 'total_bulan', 'total_minggu', 'startweek', 'endweek'));
    }
}
