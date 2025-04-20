<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Middleware\AdminFilter;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\Barang as AdminBarang;
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
    });
    
});
