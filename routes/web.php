<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LevelHargaController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanOrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [LoginController::class, 'login'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Toko Controller
Route::get('/toko', [TokoController::class, 'index'])->name('master.toko.index');
Route::get('/toko/create', [TokoController::class, 'create'])->name('master.toko.create');

// User Controller
Route::get('/user', [UserController::class, 'index'])->name('master.user.index');

// Barang Controller
Route::get('/barang', [BarangController::class, 'index'])->name('master.barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('master.barang.create');

// Jenis Barang Controller
Route::get('/jenisbarang', [JenisBarangController::class, 'index'])->name('master.jenisbarang.index');
Route::get('/jenisbarang/create', [JenisBarangController::class, 'create'])->name('master.jenisbarang.create');

// Brand Controller
Route::get('/brand', [BrandController::class, 'index'])->name('master.brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('master.brand.create');

// Supplier Controller
Route::get('/supplier', [SupplierController::class, 'index'])->name('master.supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('master.supplier.create');


Route::get('/promo', [PromoController::class, 'index'])->name('master.promo.index');

// Level Harga Controller
Route::get('/levelharga', [LevelHargaController::class, 'index'])->name('master.levelharga.index');
Route::get('/levelharga/create', [LevelHargaController::class, 'create'])->name('master.levelharga.create');

Route::get('/leveluser', [LevelUserController::class, 'index'])->name('master.leveluser.index');
Route::get('/stockopname', [StockOpnameController::class, 'index'])->name('master.stockopname.index');
Route::get('/planorder', [PlanOrderController::class, 'index'])->name('master.planorder.index');

// Pembelian Barang
Route::get('/pembelianbarang', function () {return view('transaksi.pembelianbarang.index');})->name('transaksi.pembelianbarang.index');
Route::get('/pembelianbarang/create', function () {return view('transaksi.pembelianbarang.create');})->name('transaksi.pembelianbarang.create');

// Pengiriman Barang
Route::get('/pengirimanbarang', function () {return view('transaksi.pengirimanbarang.index');})->name('transaksi.pengirimanbarang.index');
Route::get('/pengirimanbarang/create', function () {return view('transaksi.pengirimanbarang.create');})->name('transaksi.pengirimanbarang.create');
