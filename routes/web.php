<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\KategoriBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// View Default
Route::get('/', function () {
    return view('frontend.index');
});

// View ShowQRCode
// Route::get('/transaksi/out/show{data}', function () {
//     return view('transaksi.out.index');
// })->name('transaksi.out.index');

Auth::routes();

// Edit User
Route::get('/edit/auth', [UserController::class, 'edit'])->name('auth.edit');


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Kelola Barang (Operator)
Route::get('/barang', [BarangController::class, 'index'])->name('view_barang');
Route::post('/barang/store', [BarangController::class, 'store'])->name('store_barang');
Route::get('/barang/create', [BarangController::class, 'create'])->name('create_barang');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('edit_barang');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('update_barang');
Route::delete('/barang/delete/{id}', [BarangController::class, 'delete'])->name('delete_barang');

// Kelola Pemasok ( Operator )
Route::resource('pemasok', PemasokController::class);
// Kelola Kategori Barang ( Operator )
Route::resource('kategori-barang', KategoriBarangController::class);
// Kelola User (Admin)
Route::resource('users', UserController::class);    

// Kelola Transaksi dan Lihat Laporan ( Pimpinan )
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
// Kelola Barang Masuk dan Keluar ( Pimpinan )
Route::get('/transaksi/in',[TransaksiController::class, 'masuk_index'])->name('transaksi.masuk.index');
Route::get('/transaksi/out',[TransaksiController::class, 'keluar_index'])->name('transaksi.keluar.index');



// Route untuk create transaksi masuk
Route::get('/transaksi/in/create', [TransaksiController::class, 'create_masuk'])->name('transaksi.masuk.create');

// Route untuk update stok barang dari create transaksi
Route::post('/transaksi/in/store', [TransaksiController::class, 'store_masuk'])->name('transaksi.masuk.store');
// Route hapus transaksimasuk
Route::delete('/transaksi/in/delete/{id}',[TransaksiController::class, 'destroy_masuk'])->name('transaksi.masuk.destroy');

// Route untuk create transaksi keluar
Route::get('/transaksi/out/create', [TransaksiController::class, 'create_keluar'])->name('transaksi.out.create');
// Route untuk kurangi stok barang dari create transaksi
Route::post('/transaksi/out/store', [TransaksiController::class, 'store_keluar'])->name('transaksi.keluar.store');
// Route hapus transaksikeluar
Route::delete('/transaksi/out/delete/{id}',[TransaksiController::class, 'destroy_keluar'])->name('transaksi.keluar.destroy');

// Akses PDF
Route::get('/generate-pdf/{id}', [TransaksiController::class, 'generatePDFin'])->name('transaksi.masuk.pdf.one');
Route::get('/generate-pdf/out/{id}',[TransaksiController::class, 'generatePDFout'])->name('transaksi.keluar.pdf.one');


// Scan QR
Route::post('/scan-qr-out', [TransaksiController::class, 'scanQROut'])->name('transaksi.out.scan');
Route::post('/scan-qr-in', [TransaksiController::class, 'scanQRIn'])->name('transaksi.in.scan');

// Show Data Keluar
Route::get('/transaksi/show/out-{id}', [TransaksiController::class, 'showOut'])->name('transaksi.show.out');

// Print All PDF
Route::get('/print/all/in', [TransaksiController::class, 'printAll'])->name('print.in.all');
Route::get('/print/all/out', [TransaksiController::class, 'printAll'])->name('print.out.all');

Route::get('/generate-pdf/transaksi/in', [PDFController::class, 'generatePDF'])->name('generate.pdf.transaksi.in');
Route::get('/generate-pdf/transaksi/out', [PDFController::class, 'generatePDF'])->name('generate.pdf.transaksi.out');