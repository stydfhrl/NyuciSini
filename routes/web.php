<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DataOwnerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\PaketLaundriesController;

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
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// ? Admin
Route::get('/admin', function () {
    return view('dashboard');
});
// ? end Admin

// ? Karyawan Dashboard
Route::get('/karyawan', function () {
    return view('dashboard');
});
// ? end karyawan

// ? owner Dashboard
Route::get('/owner', function () {
    return view('dashboard');
});
// ? end owner

// ? Sub Menu Components
Route::resource('data-karyawan', DataKaryawanController::class)->middleware('auth');

Route::resource('data-owner', DataOwnerController::class)->middleware('auth');

Route::resource('data-outlet', OutletController::class)->middleware('auth');

Route::resource('data-customer', CustomerController::class)->middleware('auth');

Route::resource('data-laundry', PaketLaundriesController::class)->middleware('auth');

Route::resource('data-transaksi', TransaksiController::class)->middleware('auth');
// ? End Sub Menu Components

//? Laporan Transaksi
Route::get('/laporan', function () {
    return view('laporan');
})->middleware('auth');
Route::get('/laporan/laporan-general',[TransaksiController::class,'LaporanGeneral'])->middleware('auth');

Route::get('/laporan-tanggal', [TransaksiController::class, 'LaporanTanggal'])->name('laporan')->middleware('auth');
//? End Laporan Transaksi


// =================== Export PDF =================== //
Route::get('/cetak-pdf/{id}', [TransaksiController::class, 'cetakPDF'])->name('cetak-pdf');



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'auth'], function ($router) {
    Route::get('/register', [AuthController::class, 'viewregister']);
    Route::post('/postregister', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login'])->name('login.post');
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
    Route::get('/change-profile', [AuthController::class, 'changeprofile'])->name('changeprofile')->middleware('auth');
    Route::post('/update-profile', [AuthController::class, 'updateprofile'])->name('updateprofile')->middleware('auth');
});

// check Role User
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['login:admin']], function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
    });
    Route::group(['middleware' => ['login:karyawan']], function () {
        Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    });
    Route::group(['middleware' => ['login:owner']], function () {
        Route::get('owner', [OwnerController::class, 'index'])->name('owner');
    });
    
    Route::get('/identitas-aplikasi', function () {
        return view('identitas.index');
    });
});