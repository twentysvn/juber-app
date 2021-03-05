<?php

namespace App\Http\Controllers;

use App\Models\merchant_layanan;
use Illuminate\Http\Request;

class MerchantLayananController extends Controller
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
            $result = merchant_layanan::all();
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
            $req = ["nama"=>$request->nama,"alamat"=>$request->alamat,"rating"=>$request->rating,"long"=>$request->long,"lat"=>$request->lat,"idrs"=>$request->idrs];
            $result = merchant_layanan::create($req);
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
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // $req = ["nama"=>$request->nama,"alamat"=>$request->alamat,"rating"=>$request->rating,"long"=>$request->long,"lat"=>$request->lat];
            $result = merchant_layanan::findOrFail($id);
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
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(merchant_layanan $merchant_layanan)
    {
        //
    }
    public function getByIdrs($idrs)
    {
        try {
            // $req = ["nama"=>$request->nama,"phone"=>$request->phone,"idrs"=>$request->idrs,"picture"=>$request->picture,"token"=>$request->token];
            $result = merchant_layanan::where('idrs',$idrs)->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
          $req = ["nama"=>$request->nama,"alamat"=>$request->alamat,"rating"=>$request->rating,"long"=>$request->long,"lat"=>$request->lat,"idrs"=>$request->idrs];
          $result = merchant_layanan::findOrFail($id)->update($req);
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
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // $req = ["nama"=>$request->nama,"alamat"=>$request->alamat,"rating"=>$request->rating,"long"=>$request->long,"lat"=>$request->lat];
            $result = merchant_layanan::findOrFail($id)->delete();
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
}
