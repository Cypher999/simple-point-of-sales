<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\User as UserM;
use App\Models\Barang as BarangM;
use App\Models\Pembelian as PembelianM;
class Dashboard extends Controller
{
    public function index(){
        $data=[
            "user"=>UserM::count(),
            "pembelian"=>PembelianM::count(),
            "barang"=>BarangM::count(),
        ];
        return view('gudang.dashboard.index',compact('data'));
    }
}
