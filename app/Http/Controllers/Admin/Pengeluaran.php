<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengeluaran as PengeluaranM;
use Validator;
class Pengeluaran extends Controller
{
    public function index(){
        $data=PengeluaranM::get();
        return view('admin.pengeluaran.index',compact('data'));
    }
    public function formAdd(){
        return view('admin.pengeluaran.add');
    }
    public function formEdit($id){
      $data=PengeluaranM::find($id);
      if(!$data){
        return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
      }
      return view('admin.pengeluaran.edit',compact('data'));
  }
    public function prosesAdd(Request $req){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'keterangan' => 'required',
            'satuan' => 'required',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $pengeluaran=new PengeluaranM;
          $pengeluaran->harga=$req->harga;
          $pengeluaran->jumlah=$req->jumlah;
          $pengeluaran->keterangan=$req->keterangan;
          $pengeluaran->satuan=$req->satuan;
          $pengeluaran->created_at=date('Y-m-d H:i:s');
          $simpan=$pengeluaran->save();
          if($pengeluaran){           
            return redirect()->to('admin/pengeluaran')->with('success', 'pengeluaran berhasil disimpan');
          }
          
    }
    public function prosesEdit(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'keterangan' => 'required',
            'satuan' => 'required',
          ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $pengeluaran=PengeluaranM::find($id);
        $pengeluaran->harga=$req->harga;
        $pengeluaran->jumlah=$req->jumlah;
        $pengeluaran->keterangan=$req->keterangan;
        $pengeluaran->satuan=$req->satuan;
        $pengeluaran->created_at=date('Y-m-d H:i:s');
        $simpan=$pengeluaran->save();
        if($simpan){
          return redirect()->to('admin/pengeluaran')->with('success', 'pengeluaran berhasil diedit');
        }
        
    }
    public function remove(Request $req,$id){
        $pengeluaran=PengeluaranM::find($id);
        if (!$pengeluaran) {
          return redirect()->to(url("admin/pengeluaran"))->withErrors(["system"=>"data tidak Ditemukan"]);
        }
        $simpan=$pengeluaran->delete();
        if($simpan){
          return redirect()->to(url("admin/pengeluaran"))->with('success', 'pengeluaran berhasil dihapus');
        }
        
    }
}
