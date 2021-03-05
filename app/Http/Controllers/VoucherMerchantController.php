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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function show(voucher_merchant $voucher_merchant)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voucher_merchant  $voucher_merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(voucher_merchant $voucher_merchant)
    {
        //
    }
}
