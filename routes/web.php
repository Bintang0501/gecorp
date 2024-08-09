<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [LoginController::class, 'login'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
// Route::get('/', function () {
//     return view('welcome');


// });
