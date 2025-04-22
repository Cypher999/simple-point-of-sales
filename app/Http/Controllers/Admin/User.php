<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserM;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
class User extends Controller
{
    public function index(){
        $data=UserM::select('*')->get();
        return view('admin.user.index',compact('data'));
    }
    public function formAdd(){
        return view('admin.user.add');
    }
    public function formEditData($id){
      $data=UserM::find($id);
      if(!$data){
        return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
      }
      return view('admin.user.editData',compact('data'));
    }
    public function formEditPassword($id){
        $data=UserM::find($id);
        if(!$data){
          return redirect()->back()->withErrors(["system"=>"Data Tidak Ditemukan"]);
        }
        return view('admin.user.editPassword',compact('data'));
      }
    public function prosesAdd(Request $req){
        $validator = Validator::make($req->all(),[
            'username' => 'required',
            'password' => 'required|min:3',
            'confirm' => 'required|same:password|min:3',
            'role' => 'required',
            'photo'=>'sometimes|mimetypes:image/jpeg,image/jpg,image/png|max:2000',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $cekUser = UserM::where('username', $req->username)->first();
          if ($cekUser) {
            return redirect()->back()->withErrors(["username"=>"username sudah ada"]);
          }
          $photoname=Str::random(5);
          $User=new UserM;
          $User->username=$req->username;
          $User->password=Hash::make($req->password);
          $User->role=$req->role;
          if($req->photo!=NULL){
            $mimetype = $req->photo->getMimeType();
            $User->photo=$photoname.".".explode('/',$mimetype)[1];
            $req->photo->move(public_path('img'),$User->photo);
          }
          $simpan=$User->save();
          if($simpan){
            return redirect()->to('admin/user')->with('success', 'User berhasil disimpan');
          }
          
    }
    public function prosesEditData(Request $req,$id){
      $validator = Validator::make($req->all(),[
          'username' => 'required',
          'role' => 'required',
          'photo'=>'sometimes|mimetypes:image/jpeg,image/jpg,image/png|max:2000',
        ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $dataLama = UserM::find($id);
        if (!$dataLama) {
          return redirect()->to(url("admin/user"))->withErrors(["system"=>"User tidak Ditemukan"]);
        }
        $cekUser = UserM::where('username', $req->username)->first();
        if (($cekUser)&&($dataLama->username!=$req->username)) {
          return redirect()->back()->withErrors(["username"=>"username sudah ada"]);
        }
        $photoname=Str::random(5);
        $User=UserM::find($id);
        $User->username=$req->username;
        $User->role=$req->role;
        if($req->photo!=NULL){
            $mimetype = $req->photo->getMimeType();
            if($User->photo!="man.jpg"){
              if(file_exists(public_path('img'.$User->photo))){
                unlink(public_path('img'.$User->photo));
              };
            }
            else{
              $User->photo=$photoname.".".explode('/',$mimetype)[1];
            }
            $req->photo->move(public_path('img'),$User->photo);
          }
        $simpan=$User->save();

        if($simpan){
          return redirect()->to('admin/user')->with('success', 'User berhasil diedit');
        }
        
    }
    public function prosesEditPassword(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'password' => 'required',
            'confirm' => 'required|same:password',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $dataLama = UserM::find($id);
          if (!$dataLama) {
            return redirect()->to(url("admin/user"))->withErrors(["system"=>"User tidak Ditemukan"]);
          }
          $cekUser = UserM::where('username', $req->username)->first();
          if (($cekUser)&&($dataLama->username!=$req->username)) {
            return redirect()->back()->withErrors(["username"=>"username sudah ada"]);
          }
          $User=UserM::find($id);
          
          $User->password=Hash::make($req->password);
          $simpan=$User->save();
          if($simpan){
            return redirect()->to('admin/user')->with('success', 'Password berhasil diedit');
          }
          
      }
    public function remove(Request $req,$id){
        $User=UserM::find($id);
        if (!$User) {
          return redirect()->to(url("admin/user"))->withErrors(["system"=>"User tidak Ditemukan"]);
        }
        if($User->photo!="man.jpg"){
            if(file_exists(public_path('img'.$User->photo))){
                unlink(public_path('img'.$User->photo));
            };
        }
        $simpan=$User->delete();
        if($simpan){
          return redirect()->to('admin/user')->with('success', 'User berhasil dihapus');
        }
        
    }
}
