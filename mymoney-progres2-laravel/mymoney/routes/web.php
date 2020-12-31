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
    Route::post('/topup', [DashboardController::class, 'topupStore'])->name('saldo.topup');
    Route::get('/transfer', [DashboardController::class, 'transfer'])->name('saldo.transfer');
    Route::post('/transfer', [DashboardController::class, 'transferStore'])->name('saldo.transfer');
    Route::get('/riwayat', [DashboardController::class, 'riwayat'])->name('saldo.riwayat');
    Route::get('/pengeluaran', [DashboardController::class, 'pengeluaran'])->name('saldo.pengeluaran');
    Route::get('/pulsa', [DashboardController::class, 'pulsa'])->name('shop.pulsa');
    Route::post('/pulsa', [DashboardController::class, 'pulsaStore'])->name('shop.pulsa');
    Route::get('/listrik', [DashboardController::class, 'listrik'])->name('shop.listrik');
    Route::post('/listrik', [DashboardController::class, 'listrikStore'])->name('shop.listrik');
    Route::get('/catatan', [DashboardController::class, 'catatan'])->name('catatan.list');
    Route::get('/tambah-catatan', [DashboardController::class, 'tambah'])->name('catatan.add');
    Route::post('/tambah-catatan', [DashboardController::class, 'tambahNote'])->name('catatan.add');
    Route::get('/catatan/{note}', [DashboardController::class, 'catatanEdit'])->name('catatan.edit');
    Route::post('/catatan/{note}', [DashboardController::class, 'updateNote'])->name('catatan.edit');
    Route::post('/catatan/finish/{note}', [DashboardController::class, 'finishedNote'])->name('catatan.fnish');
    


    Route::get('/test', [DashboardController::class, 'test']);
    Route::get('/tabungan', [DashboardController::class, 'tabungan'])->name('tabungan.index');
    Route::get('/voucher', [DashboardController::class, 'voucher'])->name('shop.voucher');
    Route::get('/myvoucher', [DashboardController::class, 'test'])->name('myvoucher');
});

Route::middleware('auth','is_admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::get('/myaccount', [ProfileController::class, 'user'])->name('myaccount');
Route::put('/myaccount', [ProfileController::class, 'update'])->name('myaccount.update');
