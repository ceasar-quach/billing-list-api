<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        $data_login=[
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ];
        // validate login
        $check_login=Auth::attempt($data_login);

        if ($check_login) {
          // get user ID
          $userid=Auth::user()->_id;
          $data= array(
            'id'=>Auth::user()->_id,
            'ceasar'=>Auth::user()->ceasar,
            'fullname'=>Auth::user()->lastname.' '.Auth::user()->firstname,
            'timestamp'=>time()
          );
          // Create Token
          $token= JWT::encode($data,'billingList','HS512');
          return $token;
        }else{
            return response()->json(['error' => 'Unauthorize'], 401);
        }
    }


    public function showInfo (Request $request)
    {
        $token = Controller::tokenValidate();
        return $token;
    }
}
