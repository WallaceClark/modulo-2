<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Cookie::queue('custom-cookie','default-cookie',5);
        return Plan::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Cookie::get('custom-cookie');
        // return view('plan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        return Plan::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        Cookie::queue(Cookie::forget('custom-cookie'));
        return $plan;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return session()->get('custom-key');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
