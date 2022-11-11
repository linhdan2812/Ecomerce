<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Http\Requests\StoreArrivalRequest;
use App\Http\Requests\UpdateArrivalRequest;

class ArrivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArrivalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArrivalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arrival  $arrival
     * @return \Illuminate\Http\Response
     */
    public function show(Arrival $arrival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arrival  $arrival
     * @return \Illuminate\Http\Response
     */
    public function edit(Arrival $arrival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArrivalRequest  $request
     * @param  \App\Models\Arrival  $arrival
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArrivalRequest $request, Arrival $arrival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arrival  $arrival
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arrival $arrival)
    {
        //
    }
}
