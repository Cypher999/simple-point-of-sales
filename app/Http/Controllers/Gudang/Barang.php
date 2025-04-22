<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang as BarangM;
use Validator;
class Barang extends Controller
{
    public function index(){
        $data=BarangM::select('*')->get();
        return view('gudang.barang.index',compact('data'));
    }
    public function formAdd(){
        return view('gudang.barang.add');
    }
    public function formEdit($id){
      $data=BarangM::find($id);
      if(!$data){
        return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
      }
      return view('gudang.barang.edit',compact('data'));
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
            return redirect()->to(url('gudang/barang'))->with('success', 'barang berhasil disimpan');
          }
          
    }
    public function prosesEdit(Request $req,$id){
      $validator = Validator::make($req->all(),[
          'nama' => 'required',
          'harga' => 'required|numeric',
          'stok' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $dataLama = BarangM::find($id);
        if (!$dataLama) {
          return redirect()->to(url("gudang.barang"))->withErrors(["system"=>"barang tidak Ditemukan"]);
        }
        $cekBarang = BarangM::where('nama', $req->nama)->first();
        if (($cekBarang)&&($dataLama->nama!=$req->nama)) {
          return redirect()->back()->withErrors(["nama"=>"nama sudah ada"]);
        }
        $barang=BarangM::find($id);
        $barang->nama=$req->nama;
        $barang->harga=$req->harga;
        $barang->stok=$req->stok;
        $simpan=$barang->save();
        if($simpan){
          return redirect()->to(url('gudang/barang'))->with('success', 'barang berhasil diedit');
        }
        
    }
    public function remove(Request $req,$id){
        $barang=BarangM::find($id);
        if (!$barang) {
          return redirect()->to(url("gudang.barang"))->withErrors(["system"=>"barang tidak Ditemukan"]);
        }
        
        $simpan=$barang->delete();
        if($simpan){
          return redirect()->to(url('gudang/barang'))->with('success', 'barang berhasil dihapus');
        }
        
    }
}
