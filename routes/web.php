<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Middleware\AdminFilter;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\User as User;
use App\Http\Controllers\Admin\Barang as AdminBarang;
use App\Http\Controllers\Admin\Pembelian as AdminPembelian;
use App\Http\Controllers\Admin\Penjualan as AdminPenjualan;
use App\Http\Controllers\Admin\Profil as AdminProfil;
use App\Http\Controllers\Admin\Pengeluaran as Pengeluaran;
Route::get('/', [Auth::class,'index']);
Route::post('login', [Auth::class,'login']);
Route::get('logout', [Auth::class,'logout']);
Route::prefix('admin')->middleware(AdminFilter::class)->group(function(){
    Route::get('/', [AdminDashboard::class,'index']);
    Route::prefix('barang')->group(function(){
        Route::get('', [AdminBarang::class,'index']);
        Route::get('add', [AdminBarang::class,'formAdd']);
        Route::post('add', [AdminBarang::class,'prosesAdd']);
        Route::get('edit/{id}', [AdminBarang::class,'formEdit']);
        Route::post('edit/{id}', [AdminBarang::class,'prosesEdit']);
        Route::get('remove/{id}', [AdminBarang::class,'remove']);
    });
    Route::prefix('pembelian')->group(function(){
        Route::get('{barang_id}', [AdminPembelian::class,'index']);
        Route::get('add/{barang_id}', [AdminPembelian::class,'formAdd']);
        Route::post('add/{barang_id}', [AdminPembelian::class,'prosesAdd']);
        Route::get('edit/{id}', [AdminPembelian::class,'formEdit']);
        Route::post('edit/{id}', [AdminPembelian::class,'prosesEdit']);
        Route::get('remove/{id}', [AdminPembelian::class,'remove']);
    });
    Route::prefix('penjualan')->group(function(){
        Route::get('/', [AdminPenjualan::class,'index']);
        Route::get('add/', [AdminPenjualan::class,'formAdd']);
        Route::post('add/', [AdminPenjualan::class,'prosesAdd']);
        Route::get('edit/{id}', [AdminPenjualan::class,'formEdit']);
        Route::post('edit/{id}', [AdminPenjualan::class,'prosesEdit']);
        Route::get('remove/{id}', [AdminPenjualan::class,'remove']);
    });
    Route::prefix('pengeluaran')->group(function(){
        Route::get('/', [Pengeluaran::class,'index']);
        Route::get('add/', [Pengeluaran::class,'formAdd']);
        Route::post('add/', [Pengeluaran::class,'prosesAdd']);
        Route::get('edit/{id}', [Pengeluaran::class,'formEdit']);
        Route::post('edit/{id}', [Pengeluaran::class,'prosesEdit']);
        Route::get('remove/{id}', [Pengeluaran::class,'remove']);
    });
    Route::prefix('user')->group(function(){
        Route::get('', [User::class,'index']);
        Route::get('add', [User::class,'formAdd']);
        Route::post('add', [User::class,'prosesAdd']);
        Route::get('edit-data/{id}', [User::class,'formEditData']);
        Route::post('edit-data/{id}', [User::class,'prosesEditData']);
        Route::get('edit-password/{id}', [User::class,'formEditPassword']);
        Route::post('edit-password/{id}', [User::class,'prosesEditPassword']);
        Route::get('remove/{id}', [User::class,'remove']);
    });
    Route::prefix('profil')->group(function(){
        Route::get('', [AdminProfil::class,'index']);
        Route::post('add', [AdminProfil::class,'prosesAdd']);
        Route::post('edit-data', [AdminProfil::class,'prosesEditData']);
        Route::post('edit-password', [AdminProfil::class,'prosesEditPassword']);
    });
});
