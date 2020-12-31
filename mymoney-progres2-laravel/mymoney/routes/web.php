<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::middleware('auth','is_user')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/topup', [DashboardController::class, 'topup'])->name('saldo.topup');
    Route::post('/topup', [DashboardController::class, 'topupStore']);
    Route::get('/transfer', [DashboardController::class, 'transfer'])->name('saldo.transfer');
    Route::post('/transfer', [DashboardController::class, 'transferStore']);
    Route::get('/riwayat', [DashboardController::class, 'riwayat'])->name('saldo.riwayat');
    Route::get('/pengeluaran', [DashboardController::class, 'riwayat'])->name('saldo.pengeluaran');
    Route::get('/pulsa', [DashboardController::class, 'pulsa'])->name('shop.pulsa');
    Route::get('/listrik', [DashboardController::class, 'listrik'])->name('shop.listrik');
    Route::get('/voucher', [DashboardController::class, 'voucher'])->name('shop.voucher');
    Route::get('/catatan', [DashboardController::class, 'catatan'])->name('catatan');
    Route::get('/tabungan', [DashboardController::class, 'catatan'])->name('tabungan');
    Route::get('/myvoucher', [DashboardController::class, 'catatan'])->name('myvoucher');
    Route::get('/catatan/{note}', [DashboardController::class, 'catatanEdit']);
    Route::post('/catatan/{note}', [DashboardController::class, 'updatePost']);
    Route::post('/catatan/finish/{note}', [DashboardController::class, 'finishedPost']);
    Route::get('/tambah-catatan', [DashboardController::class, 'tambah']);
    Route::post('/tambah-catatan', [DashboardController::class, 'tambahPost']);
});

Route::middleware('auth','is_admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('/myaccount', [ProfileController::class, 'user'])->name('myaccount');
Route::put('/myaccount', [ProfileController::class, 'update'])->name('myaccount.update');
