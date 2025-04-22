<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang as BarangM;
use App\Models\Penjualan as PenjualanM;
use Validator;
class Penjualan extends Controller
{
    public function index(){
        $data=PenjualanM::with('barang')->get();
        return view('admin.penjualan.index',compact('data'));
    }
    public function formAdd(){
        $barang=BarangM::get();
        return view('admin.penjualan.add',compact('barang'));
    }
    public function formEdit($id){
      $data=PenjualanM::with('barang')->find($id);
      $barang=BarangM::get();
      if(!$data){
        return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
      }
      return view('admin.penjualan.edit',compact('data','barang'));
  }
    public function prosesAdd(Request $req){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'barang' => 'required',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $barang=BarangM::find($req->barang);
          if(!$barang){
            return redirect()->back()->withErrors(["system"=>"Barang Tidak Ditemukan"]);
          }
          if($barang->stok<$req->jumlah){
            return redirect()->back()->withErrors(["jumlah"=>"Stok tidak cukup"]);
          }
          $penjualan=new PenjualanM;
          $penjualan->barang_id=$req->barang;
          $penjualan->jumlah=$req->jumlah;
          $penjualan->created_at=date('Y-m-d H:i:s');
          $simpan=$penjualan->save();
          if($penjualan){            
            $barang->stok=$barang->stok-$req->jumlah;
            $barang->save();
            return redirect()->to('admin/penjualan')->with('success', 'penjualan berhasil disimpan');
          }
          
    }
    public function prosesEdit(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'barang' => 'required',
          ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $barang_baru=BarangM::find($req->barang);
        if(!$barang_baru){
            return redirect()->back()->withErrors(["system"=>"Barang Tidak Ditemukan"]);
        }
        if($barang_baru->stok<$req->jumlah){
            return redirect()->back()->withErrors(["jumlah"=>"Stok tidak cukup"]);
        }
        $penjualan=PenjualanM::find($id);
        $jumlah_lama=$penjualan->jumlah;

        $barang_id_lama=$penjualan->barang_id;
        $penjualan->jumlah=$req->jumlah;
        $penjualan->barang_id=$req->barang;
        $simpan=$penjualan->save();
        if($simpan){
          $barang_lama=BarangM::find($barang_id_lama);
          $barang_lama->stok=($barang_lama->stok+$jumlah_lama);
          $barang_lama->save();

          $barang_baru->stok=($barang_baru->stok-$req->jumlah);
          $barang_baru->save();
          return redirect()->to('admin/penjualan')->with('success', 'penjualan berhasil diedit');
        }
        
    }
    public function remove(Request $req,$id){
        $penjualan=PenjualanM::find($id);
        if (!$penjualan) {
          return redirect()->to(url("admin/penjualan"))->withErrors(["system"=>"data tidak Ditemukan"]);
        }
        $simpan=$penjualan->delete();
        if($simpan){
          return redirect()->to(url("admin/penjualan"))->with('success', 'penjualan berhasil dihapus');
        }
        
    }
}
