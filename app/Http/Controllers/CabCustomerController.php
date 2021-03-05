<?php

namespace App\Http\Controllers;

use App\Models\cab_customer;
use Illuminate\Http\Request;

class CabCustomerController extends Controller
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
            $result = cab_customer::all();
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil fetch cab_customer";
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
            $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = cab_customer::create($req);
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
     * @param  \App\Models\cab_customer  $cab_customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = cab_customer::findOrFail($id);
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
    public function getByIdrs($idrs)
    {
        try {
            // $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = cab_customer::where('idrs',$idrs)->get();
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
     * @param  \App\Models\cab_customer  $cab_customer
     * @return \Illuminate\Http\Response
     */
    public function edit(cab_customer $cab_customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cab_customer  $cab_customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        try {
            $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = cab_customer::findOrFail($id)->update($req);
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
     * @param  \App\Models\cab_customer  $cab_customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = cab_customer::findOrFail($id)->delete();
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
