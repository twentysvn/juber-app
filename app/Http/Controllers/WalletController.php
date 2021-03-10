<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use Exception;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        try {
            $type = $req->wallet_type;
            $result = wallet::with($type)->get();
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil mengambil data";
            $data['data'] = $result;
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = $e->getMessage();
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
                "order_id" => $request->order_id,
                "type" => $request->type,
                "amount" => $request->amount,
            ];
            $result = wallet::create($req);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil tambah data";
            $data['data'] = $result;
        } catch (Exception $e) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $e->getMessage();
            $data['data'] = [];
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {
        try {
            $type = $req->wallet_type;
            $result = wallet::with($type)->findOrFail($id);
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


    public function showByIdrs(Request $req, $id)
    {
        try {
            $type = $req->wallet_type;
            $result = wallet::with($type)->where('idrs', $id)->get();
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
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
