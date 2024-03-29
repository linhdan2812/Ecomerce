<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Response;

class Location extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCity(Request $request, Response $response)
    {
        $data = City::all();
        return $data;
    }
    public function getDistrict(Request $request, Response $response)
    {
        $data = [];
        $data = District::where('parent_code',sprintf("%02d", $request->input('id')))->pluck('name','id')->toArray();

        return response()->json($data);
    }
    public function getWard(Request $request, Response $response)
    {
        $data = [];
        $data = Ward::where('parent_code',sprintf("%03d", $request->input('id')))->pluck('name','id')->toArray();

        return response()->json($data);
    }
    public function deleteAddres($id)
    {
        $address = Address::find($id)->first();
        $address -> delete();
        return redirect()->back();
    }
    public function setDefaut($id)
    {
        Address::where('status',1)->update(['status' => 0]);
        Address::where('id',$id)->where('status',0)->update(['status' => 1]);
        return redirect()->back();
    }
    public function setCancelOrder(Request $request, Response $response)
    {
        $detailOrder = Order::where('id',$request->input('id'))->update(['status' => 4]);
        return route('orders'); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
