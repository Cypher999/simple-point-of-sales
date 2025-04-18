<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang as BarangM;
class Barang extends Controller
{
    public function index(){
        $data=BarangM::select('*')->get();
        return view('admin/barang/index',compact('data'));
    }
    // public function formAdd(){
    //     return view('admin/barang/add');
    // }
    // public function formEdit($id){
    //     $data=BarangM::find($id);
    //     return view('admin/barang/edit',compact('data'));
    // }
}
