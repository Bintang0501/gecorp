<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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