<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PacketDestinationController;
use App\Http\Controllers\Home\RentalMobilController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/gallery-wisata', function () {
    return view('gallery');
})->name('gallery.wisata');

Route::get('/', [HomeController::class, 'get_home'])->name('home');
Route::get('details/{slug}', [HomeController::class, 'get_detail'])->name('blog.detail');

// Route::get('/rental-mobil', [RentalMobilController::class, 'get_mobil'])->name('paket.travel');
// Route::get('/cari-mobil', [RentalMobilController::class, 'cari_mobil'])->name('cari.mobil')->middleware('auth');
// Route::post('/rental-mobil/{id}', [RentalMobilController::class, 'add'])->name('detail-add')->middleware('auth');
Route::get('cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::DELETE('cart/{id}', [CartController::class, 'cancel_booking'])->name('cart.delete')->middleware('auth');

Route::get('/paket-wisata', [PacketDestinationController::class, 'get_wisata'])->name('get-wisata');
Route::post('/paket-wisata/cart/{id}', [PacketDestinationController::class, 'add'])->name('detail-add')->middleware('auth');
Route::get('/wisata', [PacketDestinationController::class, 'wisata'])->name('wisata')->middleware('auth');
Route::get('/kegiatan-wisata', [PacketDestinationController::class, 'gallery_wisata'])->name('gallery-wisata');

// midtrans route
Route::post('checkout', [CheckoutController::class, 'proccess'])->name('checkout');
// Route::get('/success', [CheckoutController::class, 'success'])->name('success');
Route::post('/checkout/callback', [CheckoutController::class, 'success'])->name('midtrans-callback');


Auth::routes();
Route::middleware(['admin', 'auth'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::resource('gallery', GalleryController::class);
    Route::resource('article', ArticleController::class);
    // Route::resource('jadwal', JadwalController::class);
    Route::resource('user', UserController::class);
    // Route::resource('paket', PaketController::class);
    Route::resource('order', OrderController::class);
    Route::resource('transaction', TransactionController::class);
    // Route::resource('wisatawan', WisatawanController::class);

    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard-pelanggan', function () {
        return view('admin.index');
    })->name('dashboard.pelanggan');

    Route::get('/pemesanan', [OrderController::class, 'get_pesanan'])->name('pelanggan.transaksi');
    Route::get('/tiket-download/{id}', [OrderController::class, 'saveTiket'])->name('pelanggan.transaksi.download');
});
