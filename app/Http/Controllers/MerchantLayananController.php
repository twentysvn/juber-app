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
            return "asdasdda";
        } catch (\Throwable $th) {
            //throw $th;
        }
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
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function show(merchant_layanan $merchant_layanan)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, merchant_layanan $merchant_layanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merchant_layanan  $merchant_layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(merchant_layanan $merchant_layanan)
    {
        //
    }
}
