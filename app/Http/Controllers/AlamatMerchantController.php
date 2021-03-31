<?php

namespace App\Http\Controllers;

use App\Models\alamat_merchant;
use Illuminate\Http\Request;

class AlamatMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = alamat_merchant::all();
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
                "mc_id" => $request->mc_id,
                "idrs" => $request->idrs,
                "judul" => $request->judul,
                "phone" => $request->phone,
                "provinsi" => $request->provinsi,
                "kota_kab" => $request->kota_kab,
                "kecamatan" => $request->kecamatan,
                "kodepos" => $request->kodepos,
                "alamat_lengkap" => $request->alamat_lengkap,
                "rincian" => $request->rincian,
                "lat" => $request->lat,
                "lon" => $request->lon,
                "is_utama" => $request->is_utama,
                "is_layanan" => $request->is_layanan,
            ];
            // return $req;
            $result = alamat_merchant::create($req);
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

    public function getByMcid($id)
    {
        try {
            $result = alamat_merchant::where("idrs", $id)->get();
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
     * Display the specified resource.
     *
     * @param  \App\Models\alamat_merchant  $alamat_merchant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = alamat_merchant::findOrFail($id);
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
     * @param  \App\Models\alamat_merchant  $alamat_merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(alamat_merchant $alamat_merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alamat_merchant  $alamat_merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;

        try {
            $req = [
                "alamat" => $request->alamat,
                "lat" => $request->lat,
                "lon" => $request->lon,
                "judul" => $request->judul,
                "phone" => $request->phone,
            ];
            $result = alamat_merchant::findOrFail($id)->update($req);
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
     * @param  \App\Models\alamat_merchant  $alamat_merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = alamat_merchant::findOrFail($id)->delete();
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
