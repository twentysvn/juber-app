<?php

namespace App\Http\Controllers;

use App\Models\history_ride;
use App\Models\driver;
use Illuminate\Http\Request;

class HistoryRideController extends Controller
{
    public $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = history_ride::with('driver')->get();
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil fetch data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
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
        try {
            $req = [
                "idrs" => $request->idrs,
                "driver_id" => $request->driver_id,
                "cost" => $request->cost,
                "payment_method" => $request->payment_method,
                "ori_address" => $request->ori_address,
                "ori_lat" => $request->ori_lat,
                "ori_long" => $request->ori_long,
                "des_address" => $request->des_address,
                "des_lat" => $request->des_lat,
                "des_long" => $request->des_long,
                "status" => $request->status
            ];
            $result = history_ride::create($req);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil tambah data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\history_ride  $history_ride
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = history_ride::findOrFail($id);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil fetch data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
    }

    public function getByIdrs($id)
    {
        try {
            $result = history_ride::where('idrs', $id)->get();
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil fetch data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\history_ride  $history_ride
     * @return \Illuminate\Http\Response
     */
    public function edit(history_ride $history_ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\history_ride  $history_ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $req = [
                "idrs" => $request->idrs,
                "driver_id" => $request->driver_id,
                "cost" => $request->cost,
                "payment_method" => $request->payment_method,
                "ori_address" => $request->ori_address,
                "ori_lat" => $request->ori_lat,
                "ori_long" => $request->ori_long,
                "des_address" => $request->des_address,
                "des_lat" => $request->des_lat,
                "des_long" => $request->des_long,
            ];
            $result = history_ride::findOrFail($id)->create($req);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil update data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\history_ride  $history_ride
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = history_ride::findOrFail($id)->delete();
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil hapus data";
            $data['data'] = $result;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
            $data['data'] = [];
        }
        return $data;
    }
}
