<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Lp_PenjualanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\KegiatanController;


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

Route::get('/', function () {
    return view('page.login');
});
Route::middleware(['auth:sanctum'])->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard/data_list', [DashboardController::class, 'data_list'])->name('dashboard.data_list');


    // Tenant
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/password/{id}', [UserController::class, 'password'])->name('user.password');
        Route::post('/update_password', [UserController::class, 'updatePassword'])->name('user.update_password');
        Route::post('/data_list', [UserController::class, 'data_list'])->name('user.data_list');
    });

    // Aplikasi
    Route::prefix('aplikasi')->group(function () {
        Route::get('/', [AplikasiController::class, 'index'])->name('aplikasi.index');
        Route::post('/store', [AplikasiController::class, 'store'])->name('aplikasi.store');
        Route::get('/edit/{id}', [AplikasiController::class, 'edit'])->name('aplikasi.edit');
        Route::post('/update', [AplikasiController::class, 'update'])->name('aplikasi.update');
        Route::delete('/{id}', [AplikasiController::class, 'destroy'])->name('aplikasi.destroy');
        Route::post('/data_list', [AplikasiController::class, 'data_list'])->name('aplikasi.data_list');
    });
     // Aplikasi
    Route::prefix('kegiatan')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::post('/data_list', [KegiatanController::class, 'data_list'])->name('kegiatan.data_list');
    });

    // Laporan Penjualan
    Route::prefix('lp_penjualan')->group(function () {
        Route::get('/', [Lp_PenjualanController::class, 'index'])->name('lp_penjualan.index');
        Route::post('/getlaporan', [Lp_PenjualanController::class, 'getlaporan'])->name('lp_penjualan.getlaporan');
        Route::post('/exportlaporan', [Lp_PenjualanController::class, 'exportlaporan'])->name('lp_penjualan.exportlaporan');
    });

    //Auth
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/portal', [AuthController::class, 'login']);
Route::get('/lawang', [AuthController::class, 'lawang'])->name('lawang');






