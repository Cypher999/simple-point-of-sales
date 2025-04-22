<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Penjualan as PenjualanM;
class Dashboard extends Controller
{
    public function index(){
        $data=[
            "penjualan"=>PenjualanM::count(),
        ];
        return view('penjualan.dashboard.index',compact('data'));
    }
}
