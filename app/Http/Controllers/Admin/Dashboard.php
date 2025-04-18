<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as UserM;
use App\Models\Pengeluaran as PengeluaranM;
use App\Models\Penjualan as PenjualanM;
use App\Models\Barang as BarangM;
use App\Models\Pembelian as PembelianM;
class Dashboard extends Controller
{
    public function index(){
        $data=[
            "user"=>UserM::count(),
            "pengeluaran"=>PengeluaranM::count(),
            "penjualan"=>PenjualanM::count(),
            "pembelian"=>PembelianM::count(),
            "barang"=>BarangM::count(),
        ];
        return view('admin/dashboard/index',compact('data'));
    }
}
