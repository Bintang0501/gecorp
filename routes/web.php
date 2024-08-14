<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LevelHargaController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\PembelianBarangController;
use App\Http\Controllers\PlanOrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Toko Controller
Route::get('/toko', [TokoController::class, 'index'])->name('master.toko.index');
Route::get('/toko/create', [TokoController::class, 'create'])->name('master.toko.create');

// User Controller
Route::get('/user', [UserController::class, 'index'])->name('master.user.index');

// Barang Controller
Route::get('/barang', [BarangController::class, 'index'])->name('master.barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('master.barang.create');

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

// Pengiriman Barang
Route::get('/pengirimanbarang', function () {return view('transaksi.pengirimanbarang.index');})->name('transaksi.pengirimanbarang.index');
Route::get('/pengirimanbarang/create', function () {return view('transaksi.pengirimanbarang.create');})->name('transaksi.pengirimanbarang.create');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('master.index');

        // Brand Controller
        Route::get('/brand', [BrandController::class, 'index'])->name('master.brand.index');
        Route::get('/brand/create', [BrandController::class, 'create'])->name('master.brand.create');
        Route::post('/brand/store', [BrandController::class, 'store'])->name('master.brand.store');
        Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('master.brand.edit');
        Route::put('/brand/{id}', [BrandController::class, 'update'])->name('master.brand.update');
        Route::delete('/brand/{id}', [BrandController::class, 'delete'])->name('master.brand.delete');

        // Jenis Barang Controller
        Route::get('/jenis_barang', [JenisBarangController::class, 'index'])->name('master.jenisbarang.index');
        Route::get('/jenis_barang/create', [JenisBarangController::class, 'create'])->name('master.jenisbarang.create');

        // Pembelian Barang
        Route::get('/pembelianbarang', [PembelianBarangController::class, 'index'])->name('master.pembelianbarang.index');
        Route::get('/pembelianbarang/create', [PembelianBarangController::class, 'create'])->name('master.pembelianbarang.create');
        Route::post('/pembelianbarang/store', [PembelianBarangController::class, 'store'])->name('master.pembelianbarang.store');
        Route::get('/pembelianbarang/{id}/edit', [PembelianBarangController::class, 'edit'])->name('master.pembelianbarang.edit');
        Route::put('/pembelianbarang/{id}/update', [PembelianBarangController::class, 'update'])->name('master.pembelianbarang.update');
        Route::delete('/pembelianbarang/{id}/delete', [PembelianBarangController::class, 'delete'])->name('master.pembelianbarang.delete');
        
    });

});