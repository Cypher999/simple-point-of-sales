<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang as BarangM;
use Validator;
class Barang extends Controller
{
    public function index(){
        $data=BarangM::select('*')->get();
        return view('admin/barang/index',compact('data'));
    }
    public function formAdd(){
        return view('admin/barang/add');
    }
    public function prosesAdd(Request $req){
        $validator = Validator::make($req->all(),[
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $cekBarang = BarangM::where('nama', $req->nama)->first();
          if ($cekBarang) {
            return redirect()->back()->withErrors(["nama"=>"nama sudah ada"]);
          }
          $barang=new BarangM;
          $barang->nama=$req->nama;
          $barang->harga=$req->harga;
          $barang->stok=$req->stok;
          $simpan=$barang->save();
          if($simpan){
            return redirect()->to('admin/barang')->with('success', 'barang berhasil disimpan');
          }
          
    }
    // public function formEdit($id){
    //     $data=BarangM::find($id);
    //     return view('admin/barang/edit',compact('data'));
    // }
}
