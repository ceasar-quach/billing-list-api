<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function index()
    {
        if(Controller::tokenValidate()){
            $clients = Client::all();
            return $clients;
        }
    }
}
