<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserM;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
class Profil extends Controller
{
    public function index(){
        $data=UserM::find(session()->get('session_poc'));
        return view('admin.profil.index',compact('data'));
    }
    public function prosesEditData(Request $req){
      $validator = Validator::make($req->all(),[
          'username' => 'required',
          'photo'=>'sometimes|mimetypes:image/jpeg,image/jpg,image/png|max:2000',
        ]);
    
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->messages());
        }
        $dataLama = UserM::find(session()->get('session_poc'));
        if (!$dataLama) {
          return redirect()->to(url("admin/profil"))->withErrors(["system"=>"User tidak Ditemukan"]);
        }
        $cekUser = UserM::where('username', $req->username)->first();
        if (($cekUser)&&($dataLama->username!=$req->username)) {
          return redirect()->back()->withErrors(["username"=>"username sudah ada"]);
        }
        $photoname=Str::random(5);
        $User=UserM::find(session()->get('session_poc'));
        $User->username=$req->username;
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
          return redirect()->to('admin/profil')->with('success', 'User berhasil diedit');
        }
        
    }
    public function prosesEditPassword(Request $req){
        $validator = Validator::make($req->all(),[
            'lama' => 'required',
            'password' => 'required|min:3',
            'confirm' => 'required|same:password',
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $dataLama = UserM::find(session()->get('session_poc'));
          if (!$dataLama) {
            return redirect()->to(url("admin/profil"))->withErrors(["system"=>"User tidak Ditemukan"]);
          }
          $cekUser = UserM::where('username', $req->username)->first();
          if (($cekUser)&&($dataLama->username!=$req->username)) {
            return redirect()->back()->withErrors(["username"=>"username sudah ada"]);
          }
          $User=UserM::find(session()->get('session_poc'));
          if (!Hash::check($req->lama, $User->password)) {
            return redirect()->back()->withErrors(["lama"=>"password lama tidak sama"]);
          }
          $User->password=Hash::make($req->password);
          $simpan=$User->save();
          if($simpan){
            return redirect()->to('admin/profil')->with('success', 'Password berhasil diedit');
          }
          
      }
}
