<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Firebase\JWT\Key;
use Firebase\JWT\JWT;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // CHECK TOKEN
    public static function tokenValidate(){
        //Verify if token exist in header
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])){
          header('HTTP/1.0 400 Bad Request');
          exit;
        }
        // Attempt to extract the token from the Bearer header
        if (! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
           header('HTTP/1.0 400 Bad Request');
           exit;
         }
         $jwt = $matches[1];
         if (!$jwt) {
           // No token was able to be extracted from the authorization header
           header('HTTP/1.0 400 Bad Request');
           exit;
         }
          JWT::$leeway += 60;
          $token = JWT::decode((string)$jwt, new Key('WeRKaiser','HS512'));
            //condition for expired token - deal with it later
          return $token;
      }
}
