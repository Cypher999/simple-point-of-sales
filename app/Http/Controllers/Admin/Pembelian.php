<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang as BarangM;
use App\Models\Pembelian as PembelianM;
use Validator;
class Pembelian extends Controller
{
    public function index($barang_id){
        $barang=BarangM::find($barang_id);
        if(!$barang){
          return redirect()->back()->withErrors(["system"=>"barang Tidak Ditemukan"]);
        }
        $data=PembelianM::where('barang_id',$barang_id)->get();
        return view('admin.pembelian.index',compact('data','barang'));
    }
    public function formAdd($barang_id){
        $data=BarangM::select('id','nama')->where('id',$barang_id)->first();
        if(!$data){
          return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
        }
        return view('admin.pembelian.add',compact('data'));
    }
    public function formEdit($id){
      $data=PembelianM::with('barang')->find($id);
      if(!$data){
        return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
      }
      return view('admin.pembelian.edit',compact('data'));
  }
    public function prosesAdd(Request $req,$barang_id){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'suplier' => 'required',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $pembelian=new PembelianM;
          $pembelian->barang_id=$barang_id;
          $pembelian->jumlah=$req->jumlah;
          $pembelian->harga=$req->harga;
          $pembelian->suplier=$req->suplier;
          $pembelian->created_at=date('Y-m-d H:i:s');
          $simpan=$pembelian->save();
          if($pembelian){
            $barang=BarangM::find($barang_id);
            $barang->stok=$barang->stok+$req->jumlah;
            $barang->save();
            return redirect()->to('admin/pembelian/'.$barang_id)->with('success', 'pembelian berhasil disimpan');
          }
          
    }
    public function prosesEdit(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'suplier' => 'required',
          ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $pembelian=PembelianM::find($id);
        $jumlah_lama=$pembelian->jumlah;
        $pembelian->jumlah=$req->jumlah;
        $pembelian->harga=$req->harga;
        $pembelian->suplier=$req->suplier;
        $simpan=$pembelian->save();
        if($simpan){
          $barang=BarangM::find($pembelian->barang_id);
          $barang->stok=($barang->stok-$jumlah_lama)+$req->jumlah;
          $barang->save();
          return redirect()->to('admin/pembelian/'.$pembelian->barang_id)->with('success', 'pembelian berhasil diedit');
        }
        
    }
    public function remove(Request $req,$id){
        $pembelian=PembelianM::find($id);
        if (!$pembelian) {
          return redirect()->to(url('admin/pembelian/'.$pembelian->barang_id))->withErrors(["system"=>"data tidak Ditemukan"]);
        }
        $simpan=$pembelian->delete();
        if($simpan){
          return redirect()->to(url('admin/pembelian/'.$pembelian->barang_id))->with('success', 'pembelian berhasil dihapus');
        }
        
    }
}
