<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index(Request $request)
    {   
        //http://localhost/test?food=lasanha&drink=orangejuice
        $params = $request->all();
        $user = auth()->user();
        $client = $user->client;
        $signature = $client->signatures->first();
        $planSignature = $signature->plan;
        $status = $signature->status;
        
        return view('test', [
            'name'      =>  $user->name,
            'document'  =>  $client->document,
            'plan'      =>  $planSignature->name.' - '.$planSignature->short_description,
            'status'    =>  $status->name,
            'params'    =>  $params
        ]);
    }
}
