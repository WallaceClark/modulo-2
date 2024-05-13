<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignatureController extends Controller
{
    public function index(Request $request)
    {   
        //http://localhost/test?food=lasanha&drink=orangejuice
        $requestData = $request->all();
        $rules = [
            'food'  =>  'required|string',
            'drink' =>  'required|string'
        ];
        $errors = [];       
        $validator = Validator::make($requestData,$rules);
        if($validator->fails()) {
            return $validator->messages();
        }

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
            'params'    =>  $validator->validated()
        ]);
    }
}
