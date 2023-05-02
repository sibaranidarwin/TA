<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PacketDestinationController;
use App\Http\Controllers\Home\RentalMobilController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PelangganController;
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

Route::post('form-tiket/{id}', [CartController::class, 'formtiket'])->name('form-tiket')->middleware('auth');
Route::post('form-tiket/cart/{id}', [CartController::class, 'add'])->name('add-form')->middleware('auth');

Route::get('cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::DELETE('cart/{id}', [CartController::class, 'cancel_booking'])->name('cart.delete')->middleware('auth');
Route::get('profilepengunjung/{id}', [HomeController::class, 'profilepengunjung'])->name('profilepengunjung')->middleware('auth');

Route::get('/paket-wisata', [PacketDestinationController::class, 'get_wisata'])->name('get-wisata');
Route::post('/paket-wisata/cart/{id}', [PacketDestinationController::class, 'add'])->name('detail-add')->middleware('auth');
Route::get('/wisata', [PacketDestinationController::class, 'wisata'])->name('wisata')->middleware('auth');
Route::get('/event', [PacketDestinationController::class, 'event'])->name('event')->middleware('auth');
Route::get('/kegiatan-wisata', [PacketDestinationController::class, 'gallery_wisata'])->name('gallery-wisata');

// midtrans route
Route::post('checkout', [CheckoutController::class, 'proccess'])->name('checkout');
// Route::get('/success', [CheckoutController::class, 'success'])->name('success');
Route::post('/checkout/callback', [CheckoutController::class, 'success'])->name('midtrans-callback');

//testimonial
Route::post('testimoni', [HomeController::class, 'testimoni'])->name('testimoni')->middleware('auth');

Auth::routes();
Route::middleware(['admin', 'auth'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/{id}', [HomeController::class, 'profile'])->name('profile');
    Route::get('filterdashboardadmin', [HomeController::class, 'filterdash'])->name('filterdashadmin');
    Route::get('filterpembayaranadmin', [HomeController::class, 'filterpembayaran'])->name('filterpembayaranadmin');
    Route::get('filterpemesananadmin', [HomeController::class, 'filterpemesanan'])->name('filterpemesananadmin');

    Route::resource('galleryy', GalleryController::class);
    Route::resource('articlee', ArticleController::class);
    // Route::resource('jadwal', JadwalController::class);
    Route::resource('userr', UserController::class);
    // Route::resource('paket', PaketController::class);
    Route::resource('orderr', OrderController::class);
    Route::resource('transactionn', TransactionController::class);
    Route::resource('pembayarann', TransactionController::class);
    // Route::resource('wisatawan', WisatawanController::class);

    Route::resource('productt', ProductController::class);
    Route::resource('categoryy', CategoryController::class);
});

Route::middleware(['penjual', 'auth'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboardpenjual', [PenjualController::class, 'dashboard'])->name('dashboardpenjual');
    Route::get('profile/{id}', [HomeController::class, 'profile'])->name('profile');
    Route::get('filterdashboard', [HomeController::class, 'filterdash'])->name('filterdash');
    Route::get('filterpembayaran', [HomeController::class, 'filterpembayaran'])->name('filterpembayaran');
    Route::get('filterpemesanan', [HomeController::class, 'filterpemesanan'])->name('filterpemesanan');

    Route::resource('gallery', GalleryController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('order', OrderController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('pembayaran', TransactionController::class);
    
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard-pelanggan', [PelangganController::class, 'dashboard'])->name('dashboard.pelanggan');
    Route::get('/testimoni', [HomeController::class, 'testimoni'])->name('pelangggan.testimoni');
    Route::get('/pemesanan', [OrderController::class, 'get_pesanan'])->name('pelanggan.transaksi');
    Route::get('/tiket-download/{id}', [OrderController::class, 'saveTiket'])->name('pelanggan.transaksi.download');
});
