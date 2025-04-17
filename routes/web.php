<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
Route::get('/', [Auth::class,'index']);
Route::post('login', [Auth::class,'login']);
