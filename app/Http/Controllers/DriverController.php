<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = driver::all();
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
            $req = ["idrs"=>$request->idrs,
                    "sim"=>$request->sim,
                    "nama"=>$request->nama,
                    "phone"=>$request->phone,
                    "vhc_brand"=>$request->vhc_brand,
                    "vhc_model"=>$request->vhc_model,
                    "picture"=>$request->picture,
                    "document"=>$request->document,
                    ];  
            $result = driver::create($req);
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = driver::findOrFail($id);
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
            $result = driver::where('idrs',$id)->get();
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        //
    }


    public function updateDriverStatus(Request $request, $id)
    {
        try {
            if($request->has('status')){
                $req = [
                    "status"=>$request->status,
                    ]; 
            }else{
                $req = [
                    "lat"=>$request->lat,
                    "long"=>$request->long,
                    ]; 
            }          
            $result = driver::findOrFail($id)->create($req);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $req = ["idrs"=>$request->idrs,
                    "sim"=>$request->sim,
                    "nama"=>$request->nama,
                    "phone"=>$request->phone,
                    "vhc_brand"=>$request->vhc_brand,
                    "vhc_model"=>$request->vhc_model,
                    "picture"=>$request->picture,
                    "document"=>$request->document,
                    ];  
            $result = driver::findOrFail($id)->create($req);
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = driver::findOrFail($id)->get();
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
