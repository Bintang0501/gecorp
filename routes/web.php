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


Route::get('/barang', [BarangController::class, 'index'])->name('master.barang.index');
Route::get('/jenisbarang', [JenisBarangController::class, 'index'])->name('master.jenisbarang.index');
Route::get('/brand', [BrandController::class, 'index'])->name('master.brand.index');
Route::get('/supplier', [SupplierController::class, 'index'])->name('master.supplier.index');
Route::get('/promo', [PromoController::class, 'index'])->name('master.promo.index');
Route::get('/levelharga', [LevelHargaController::class, 'index'])->name('master.levelharga.index');
Route::get('/leveluser', [LevelUserController::class, 'index'])->name('master.leveluser.index');
Route::get('/stockopname', [StockOpnameController::class, 'index'])->name('master.stockopname.index');
Route::get('/planorder', [PlanOrderController::class, 'index'])->name('master.planorder.index');
// Route::get('/', function () {
//     return view('welcome');


// });
