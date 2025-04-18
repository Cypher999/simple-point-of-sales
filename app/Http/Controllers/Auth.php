<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $req){
        $validator = Validator::make($req->all(),[
            'username' => 'required',
            'password' => 'required'
          ]);
      
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
          }
          $user = User::where('username', $req->username)->first();
          if (!$user) {
            return redirect()->back()->withErrors(["system"=>"user not found"]);
          }
          if (!Hash::check($req->password, $user->password)) {
            return redirect()->back()->withErrors(["system"=>"wrong password"]);
          }
          session()->put('session_poc',$user->getAuthIdentifier());

          return Response::json(["status"=>'successs','message' => 'Login successful, redirecting']);
    }
}
