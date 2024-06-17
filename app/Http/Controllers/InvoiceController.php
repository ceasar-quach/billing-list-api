<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public function index(Request $request)
    {
    if(Controller::tokenValidate()){
        //list all current user billing
        $billings = Invoice::where(
            ['client' => $request->clientId]
        )->get();
        if ($billings!==null){
            return response()->json([
                'Message'=>'Success',
                'data' => $billings,
            ], 200);
        }else{
            return response()-> json([
                'message'=>"null"
            ], 404);
        }
    }else{
        return response()-> json([
            'message'=>"error"
        ], 400);
    }
    }


    public function show($invoiceId)
    {
        if(Controller::tokenValidate()){
            //get a specific bill detail
            $bill = Invoice::where('_id',$invoiceId)->get();
            if ($bill!==null){
                return response()->json([
                    'Message'=>'Success',
                    'BillDetail' => $bill,
                ], 200);
            }else{
                return response()-> json([
                    'message'=>"null"
                ], 404);
            }
        }else{
            return response()-> json([
                'message'=>"error"
            ], 400);
        }
    }
    
}
