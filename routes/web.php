<?php

use App\Http\Controllers\AuthController;
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
Route::post('/toko/store', [TokoController::class, 'store'])->name('master.toko.store');
Route::get('/toko/edit/{id}', [TokoController::class, 'edit'])->name('master.toko.edit');
Route::put('/toko/update/{id}', [TokoController::class, 'update'])->name('master.toko.update');
Route::delete('/toko/delete/{id}', [TokoController::class, 'delete'])->name('master.toko.delete');

// User Controller
Route::get('/user', [UserController::class, 'index'])->name('master.user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('master.user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('master.user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('master.user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('master.user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('master.user.delete');

// Barang Controller
Route::get('/barang', [BarangController::class, 'index'])->name('master.barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('master.barang.create');

// Jenis Barang Controller
Route::get('/jenisbarang', [JenisBarangController::class, 'index'])->name('master.jenisbarang.index');
Route::get('/jenisbarang/create', [JenisBarangController::class, 'create'])->name('master.jenisbarang.create');
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store'])->name('master.jenisbarang.store');
Route::get('/jenisbarang/edit{id}', [JenisBarangController::class, 'edit'])->name('master.jenisbarang.edit');
Route::put('/jenisbarang/update{id}', [JenisBarangController::class, 'update'])->name('master.jenisbarang.update');
Route::delete('/jenisbarang/delete{id}', [JenisBarangController::class, 'delete'])->name('master.jenisbarang.delete');

// Brand Controller
Route::get('/brand', [BrandController::class, 'index'])->name('master.brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('master.brand.create');

// Supplier Controller
Route::get('/supplier', [SupplierController::class, 'index'])->name('master.supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('master.supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('master.supplier.store');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('master.supplier.edit');
Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('master.supplier.update');
Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('master.supplier.delete');

// Promo Controller
Route::get('/promo', [PromoController::class, 'index'])->name('master.promo.index');
Route::get('/promo.create', [PromoController::class, 'create'])->name('master.promo.create');

// Level Harga Controller
Route::get('/levelharga', [LevelHargaController::class, 'index'])->name('master.levelharga.index');
Route::get('/levelharga/create', [LevelHargaController::class, 'create'])->name('master.levelharga.create');
Route::post('/levelharga/store', [LevelHargaController::class, 'store'])->name('master.levelharga.store');
Route::get('/levelharga/edit/{id}', [LevelHargaController::class, 'edit'])->name('master.levelharga.edit');
Route::put('/levelharga/update/{id}', [LevelHargaController::class, 'update'])->name('master.levelharga.update');
Route::delete('/levelharga/delete/{id}', [LevelHargaController::class, 'delete'])->name('master.levelharga.delete');

// Level User Controller
Route::get('/leveluser', [LevelUserController::class, 'index'])->name('master.leveluser.index');
Route::get('/leveluser/create', [LevelUserController::class, 'create'])->name('master.leveluser.create');
Route::post('/leveluser/store', [LevelUserController::class, 'store'])->name('master.leveluser.store');
Route::get('/leveluser/edit/{id}', [LevelUserController::class, 'edit'])->name('master.leveluser.edit');
Route::put('/leveluser/update/{id}', [LevelUserController::class, 'update'])->name('master.leveluser.update');
Route::delete('/leveluser/delete/{id}', [LevelUserController::class, 'delete'])->name('master.leveluser.delete');

Route::get('/stockopname', [StockOpnameController::class, 'index'])->name('master.stockopname.index');
Route::get('/planorder', [PlanOrderController::class, 'index'])->name('master.planorder.index');

// Pembelian Barang
Route::get('/pembelianbarang', function () {return view('transaksi.pembelianbarang.index');})->name('transaksi.pembelianbarang.index');
Route::get('/pembelianbarang/create', function () {return view('transaksi.pembelianbarang.create');})->name('transaksi.pembelianbarang.create');

// Pengiriman Barang
Route::get('/pengirimanbarang', function () {return view('transaksi.pengirimanbarang.index');})->name('transaksi.pengirimanbarang.index');
Route::get('/pengirimanbarang/create', function () {return view('transaksi.pengirimanbarang.create');})->name('transaksi.pengirimanbarang.create');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
// Route::get('/login', [LoginController::class, 'login'])->name('login');

// Route::group(['middleware' => ['guest']], function () {
//     Route::prefix('login')->group(function () {
//         Route::get('/', [LoginController::class, 'login']);
//         Route::post('/', [LoginController::class, 'post_login'])->name('post_login');
//     });
// });

// Route::group(['middleware' => ['is_autentikasi']], function () {
//     Route::prefix('super_admin')->group(function () {
//         Route::get('/dashboard', [SuperAdminController::class, 'dashboard_admin'])->name('ds_admin');

//         // Route::prefix('buku_pelaut')->group(function(){
//         //     Route::get('/', [SuperAdminBukuPelautController::class, 'index']);
//         //     Route::get('/show/{id}', [SuperAdminBukuPelautController::class, 'show']);
//         //     Route::put('/update/{id}', [SuperAdminBukuPelautController::class, 'update']);
//         // });

//     Route::get('/logout', [LoginController::class, 'logout']);
//     });
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});