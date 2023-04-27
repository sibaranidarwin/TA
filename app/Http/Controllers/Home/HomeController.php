<?php

namespace App\Http\Controllers\Home;

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

class HomeController extends Controller
{
    public function get_home(Request $request)
    {   
        // $article = DB::table('articles')->get();
        $products = DB::table('products')->where("category_id", 1)->get();
        $product = DB::table('products')->where("category_id", 2)->where("tgl_event", "<=" , now())->limit(3)->get();
        $users = DB::table('users')->where(Auth::user());
        $testimonis = DB::table('testimoni')->limit(3)->get();
        
        // dd($product);
        return view('welcome', compact('product', 'products', 'users', 'testimonis'));
    }


    public function get_detail($slug)
    {
        $article = Article::with('gallery')->where('slug', $slug)->first();
        $gallery = Gallery::where('article_id', $article->id)->get();
        return view('detail', compact('article', 'gallery'));
    }

    public function testimoni(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'isi' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        
        Testimoni::create([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'isi' => $request->input('isi')
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }

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

        $total_bulan_wisata =Transaction::whereBetween('tgl_wisata', [$startmonth, $endmonth])->where('status', 'success')->sum('total_harga');
        $total_bulan_event =Transaction::whereBetween('tgl_wisata', [$startmonth, $endmonth])->where('status', 'success')->sum('total_harga');

        $startweek = $now->startOfWeek(Carbon::MONDAY)->format('d');
        $endweek = $now->endOfWeek()->format('d');

        return view('admin.index', compact('total_tahun', 'total_bulan', 'total_minggu', 'startweek', 'endweek', 'total_bulan_wisata', 'total_bulan_event'));
    }

    function filterdash(){
        if (request()->month || request()->yer){
    
                $a = date('Y-m-d');
                $b = date('Y-m-d',strtotime('+1 days'));
                $range = [$a, $b];

                // $good_receipt = Transaction::whereMonth('created_at', $month = request()->input('month'))->whereYear('created_at', $yer = request()->input('yer'))->where('id_vendor', $user_vendor)->where('id_inv',0)->orwhere('status','Auto Verify')->where('status','Verified')->orWhereNull('status')->count();

                // $dispute = Transaction::whereMonth('created_at', $month = request()->input('month'))->whereYear('created_at', $yer = request()->input('yer'))->where("status", "Disputed")->Where("vendor_name", $user_vendor)->count();
               
            } else {
               
                       
            }
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

            return view('admin.index',compact('total_tahun', 'total_bulan', 'total_minggu'))
            ->with('i',(request()->input('page', 1) -1) *5);
        }
        
        function filterpembayaran(){

            if (request()->start_date || request()->end_date) {
                $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                
                $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select('transactions.*', 'users.name')
                ->whereBetween('transactions.created_at', [$start_date,$end_date])
                ->orderBy('id', 'DESC')
                ->get();

            } else {
                $transaction = Transaction::leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select('transactions.*', 'users.name')
                ->orderBy('id', 'DESC')
                ->get();
            }
            
            return view('admin.pembayaran.index', compact('transaction', 'start_date', 'end_date'));
        }

        public function filterpemesanan(){

            if (request()->start_date || request()->end_date) {
                $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                
                $transaction = TransactionDetail::leftJoin('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->leftJoin('products', 'transaction_details.product_id', '=', 'products.id')
                ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select(
                    'transaction_details.*',
                    'transactions.total_harga',
                    'transactions.status',
                    'users.name',
                    'products.nama_produk',
                )
                ->whereBetween('transaction_details.created_at', [$start_date,$end_date])
                ->orderBy('id', 'DESC')
                ->get();

                // dd($transaction);

            } else {
                $transaction = TransactionDetail::leftJoin('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->select('transaction_details.*', 'transactions.nama_tiket')
                ->orderBy('id', 'DESC')
                ->get();

            }
            
            return view('admin.pesanan.index', compact('transaction', 'start_date', 'end_date'));
        }

        public function profile($id){
            
            $user = Auth::user();

            // dd($user);
            return view('admin.user.profile', compact('user'));
        }

        public function profilepengunjung(){
            $user = Auth::user();

            // dd($user);
            return view('profile', compact('user'));
        }
}
