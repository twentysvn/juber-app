<?php

namespace App\Http\Controllers;

use App\Models\voucher_merchant;
use Illuminate\Http\Request;

class VoucherMerchantController extends Controller
{
    public $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "sukses";
        try {
            $result = voucher_merchant::all();
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
            $req = ["merchant_id"=>$request->merchant_id,
                    "voucher_name"=>$request->voucher_name,
                    "voucher_desc"=>$request->voucher_desc,
                    "valid_until"=>$request->valid_until,
                    "nominal"=>$request->nominal,
                    ];  
            $result = voucher_merchant::create($req);
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
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = voucher_merchant::findOrFail($id);
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

    public function getByMcid($id)
    {
        try {
            $result = voucher_merchant::where("merchant_id",$id)->get();
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
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher_merchant $voucher_merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voucher_merchant $voucher_merchant)
    {
        try {
            $req = [
                "merchant_id"=>$request->merchant_id,
                "voucher_name"=>$request->voucher_name,
                "voucher_desc"=>$request->voucher_desc,
                "valid_until"=>$request->valid_until,
                "nominal"=>$request->nominal,
            ];  
            $result = voucher_merchant::create($req);
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
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = voucher_merchant::findOrFail($id)->delete();
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
