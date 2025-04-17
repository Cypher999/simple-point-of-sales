<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function login(Request $req){
        $validator = Validator::make($req->all(),[
            'username' => 'required',
            'password' => 'required'
          ]);
      
          if ($validator->fails()) {
            return Response::json([
              "status"=>'error',
              "message"=>$validator->messages()]
              ,502);
          }
          $user = User::where('username', $req->username)->first();
          if (!$user) {
            return Response::json([
              "status"=>'error',
              "message"=>"user not found"]
              ,502);
          }
          if (!Hash::check($req->password, $user->password)) {
            return Response::json([
                "status"=>'error',
                "message"=>"incorrect password"]
                ,502);
          }
          session()->put('session_poc',$user->getAuthIdentifier());

          return Response::json(["status"=>'successs','message' => 'Login successful, redirecting']);
    }
}
