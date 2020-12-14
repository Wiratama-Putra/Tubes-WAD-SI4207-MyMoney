<?php

use App\Http\Controllers\DashboardController;
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
});
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/topup', [DashboardController::class, 'topup'])->name('topup');
    Route::post('/topup', [DashboardController::class, 'topupStore']);
    Route::get('/transfer', [DashboardController::class, 'transfer'])->name('transfer');
    Route::post('/transfer', [DashboardController::class, 'transferStore']);
    Route::get('/riwayat', [DashboardController::class, 'riwayat'])->name('riwayat');
    Route::get('/pulsa', [DashboardController::class, 'pulsa'])->name('pulsa');
    Route::get('/listrik', [DashboardController::class, 'listrik'])->name('listrik');
    Route::get('/user', [DashboardController::class, 'user'])->name('user');
    Route::get('/voucher', [DashboardController::class, 'voucher'])->name('voucher');
    Route::get('/catatan', [DashboardController::class, 'catatan'])->name('catatan');
    Route::get('/catatan/{note}', [DashboardController::class, 'catatanEdit']);
    Route::post('/catatan/{note}', [DashboardController::class, 'updatePost']);
    Route::post('/catatan/finish/{note}', [DashboardController::class, 'finishedPost']);
    Route::get('/tambah-catatan', [DashboardController::class, 'tambah']);
    Route::post('/tambah-catatan', [DashboardController::class, 'tambahPost']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
