<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LevelHargaController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PembelianBarangController;
use App\Http\Controllers\PengirimanBarangController;
use App\Http\Controllers\PlanOrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StockBarangController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;

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
        Route::post('/jenis_barang/store', [JenisBarangController::class, 'store'])->name('master.jenisbarang.store');
        Route::get('/jenis_barang{id}/edit', [JenisBarangController::class, 'edit'])->name('master.jenisbarang.edit');
        Route::put('/jenis_barang{id}/update', [JenisBarangController::class, 'update'])->name('master.jenisbarang.update');
        Route::delete('/jenis_barang{id}/delete', [JenisBarangController::class, 'delete'])->name('master.jenisbarang.delete');

        // Pembelian Barang
        Route::get('/pembelianbarang', [PembelianBarangController::class, 'index'])->name('master.pembelianbarang.index');
        Route::get('/pembelianbarang/create', [PembelianBarangController::class, 'create'])->name('master.pembelianbarang.create');
        Route::post('/pembelianbarang/store', [PembelianBarangController::class, 'store'])->name('master.pembelianbarang.store');
        Route::post('/pembelianbarang/additem', [PembelianBarangController::class, 'addItem'])->name('master.pembelianbarang.additem');
        Route::delete('/pembelianbarang/remove-item/{id}', [PembelianBarangController::class, 'removeItem']);
        Route::get('/pembelianbarang/{id}/edit', [PembelianBarangController::class, 'edit'])->name('master.pembelianbarang.edit');
        Route::put('/pembelianbarang/{id}/update', [PembelianBarangController::class, 'update'])->name('master.pembelianbarang.update');
        Route::delete('/pembelianbarang/{id}/delete', [PembelianBarangController::class, 'delete'])->name('master.pembelianbarang.delete');
        Route::get('/get-stock/{id_barang}', [PembelianBarangController::class, 'getStock'])->name('master.pembelian.getstock');
        Route::post('/pembelianbarang/update_status/{id}', [PembelianBarangController::class, 'updateStatus'])->name('master.pembelianbarang.update_status');

        // Toko Controller
        Route::get('/toko', [TokoController::class, 'index'])->name('master.toko.index');
        Route::get('/toko/create', [TokoController::class, 'create'])->name('master.toko.create');
        Route::post('/toko/store', [TokoController::class, 'store'])->name('master.toko.store');
        Route::get('/toko/edit/{id}', [TokoController::class, 'edit'])->name('master.toko.edit');
        Route::put('/toko/update/{id}', [TokoController::class, 'update'])->name('master.toko.update');
        Route::delete('/toko/delete/{id}', [TokoController::class, 'delete'])->name('master.toko.delete');
        Route::get('/toko/detail/{id}', [TokoController::class, 'detail'])->name('master.toko.detail');
        Route::get('/toko/detail/create/{id}', [TokoController::class, 'create_detail'])->name('master.toko.create_detail');
        Route::post('/toko/store_detail', [TokoController::class, 'store_detail'])->name('master.toko.store_detail');
        Route::get('/toko/{id_toko}/detail/{id_barang}/edit/{id}', [TokoController::class, 'edit_detail'])->name('master.toko.edit_detail');
        Route::put('/toko/{id_toko}/detail/{id_barang}/update', [TokoController::class, 'update_detail'])->name('master.toko.update_detail');
        Route::delete('/toko/{id_toko}/detail/{id_barang}/delete', [TokoController::class, 'delete_detail'])->name('master.toko.delete_detail');

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
        Route::post('/barang/store', [BarangController::class, 'store'])->name('master.barang.store');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('master.barang.edit');
        Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('master.barang.update');
        Route::get('/get-brands-by-jenis', [BrandController::class, 'getBrandsByJenis'])->name('getBrandsByJenis');


        // Supplier Controller
        Route::get('/supplier', [SupplierController::class, 'index'])->name('master.supplier.index');
        Route::get('/supplier/create', [SupplierController::class, 'create'])->name('master.supplier.create');
        Route::post('/supplier/store', [SupplierController::class, 'store'])->name('master.supplier.store');
        Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('master.supplier.edit');
        Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('master.supplier.update');
        Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('master.supplier.delete');

        // Member Controller
        // Route::get('/get-wilayah', [MemberController::class, 'getWilayah']);
        Route::get('/member', [MemberController::class, 'index'])->name('master.member.index');
        Route::get('/member/create', [MemberController::class, 'create'])->name('master.member.create');

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

        // Stock Barang Controller
        Route::get('/stockbarang', [StockBarangController::class, 'index'])->name('master.stockbarang.index');
        Route::get('/stockbarang/create', [StockBarangController::class, 'create'])->name('master.stockbarang.create');
        Route::get('/get-stock-details/{id_barang}', [StockBarangController::class, 'getStockDetails'])->name('get-stock-details');

        Route::get('/stockopname', [StockOpnameController::class, 'index'])->name('master.stockopname.index');
        Route::get('/planorder', [PlanOrderController::class, 'index'])->name('master.planorder.index');

        // Pengiriman Barang
        Route::get('/pengirimanbarang', [PengirimanBarangController::class, 'index'])->name('master.pengirimanbarang.index');
        Route::get('/pengirimanbarang/create', [PengirimanBarangController::class, 'create'])->name('master.pengirimanbarang.create');
        Route::get('/pengirimanbarang/detail{id}', [PengirimanBarangController::class, 'detail'])->name('master.pengirimanbarang.detail');
        Route::get('/get-users-by-toko/{id_toko}', [PengirimanBarangController::class, 'getUsersByToko']);
        Route::get('/get-barang-stock/{id_toko}', [PengirimanBarangController::class, 'getBarangStock']);
        Route::get('/get-harga-barang/{id_barang}', [PengirimanBarangController::class, 'getHargaBarang']);
        Route::post('/pengirimanbarang/additem', [PengirimanBarangController::class, 'addItem'])->name('master.pengirimanbarang.additem');
        Route::delete('/pengirimanbarang/remove-item/{id}', [PengirimanBarangController::class, 'removeItem']);
        // Route::get('/get-barangs-by-toko/{id_toko}', [PengirimanBarangController::class, 'getBarangsByToko']);
        // Route::get('/get-harga-barang/{id_detail}/{id_toko}', [PengirimanBarangController::class, 'getHargaBarang']);
        Route::post('/pengirimanbarang/store', [PengirimanBarangController::class, 'store'])->name('master.pengirimanbarang.store');
        Route::get('/pengirimanbarang/edit/{id}', [PengirimanBarangController::class, 'edit'])->name('master.pengirimanbarang.edit');
        Route::post('/pengirimanbarang/update_status/{id}', [PengirimanBarangController::class, 'updateStatus'])->name('master.pengirimanbarang.update_status');
        Route::put('/pengirimanbarang/update/{id}', [PengirimanBarangController::class, 'update'])->name('master.pengirimanbarang.update');

        // Route::get('/get-harga-barang/{id_detail}/{id_toko}/{id_barang}', [TokoController::class, 'getHargaBarang']);
        // Pada file routes/web.php


        // Pada file routes/web.php

        // Route::get('/pengirimanbarang', function () {return view('master.pengirimanbarang.index');})->name('master.pengirimanbarang.index');
        // Route::get('/pengirimanbarang/create', function () {return view('transaksi.pengirimanbarang.create');})->name('transaksi.pengirimanbarang.create');

    });

});

