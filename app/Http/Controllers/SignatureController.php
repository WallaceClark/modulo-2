<?php

namespace App\Http\Controllers;

class SignatureController extends Controller
{
    public function index()
    {   
        $user = auth()->user();
        $client = $user->client;
        $signature = $client->signatures->first();
        $planSignature = $signature->plan;
        $status = $signature->status;
        
        return view('test', [
            'name'      =>  $user->name,
            'document'  =>  $client->document,
            'plan'      =>  $planSignature->name.' - '.$planSignature->short_description,
            'status'    =>  $status->name
        ]);
    }
}
