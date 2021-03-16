<?php

namespace App\Http\Controllers;

use App\Models\rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
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
        $dataTable = [];
        function checkifexist($column,$request_name,$request,$dataTable){
            if( ($request->has($request_name))){
               $databaru = addData($column,$request_name,$request,$dataTable);
               return $databaru;
            }
            else{
                return $dataTable;
            }
        }
        function addData($column,$request_name,$request,$dataTable){
            $dataTable[$column] = $request[$request_name];
            return $dataTable;
        }
        $dataTable = checkifexist("name","name",$request,$dataTable);
        $dataTable = checkifexist("no_rek","no_rek",$request,$dataTable);
        $dataTable = checkifexist("bank_id","bank_id",$request,$dataTable);
        $dataTable = checkifexist("branch_name","branch_name",$request,$dataTable);
        $dataTable = checkifexist("city","city",$request,$dataTable);
        try {
           
            rekening::create($dataTable);
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $dataTable;
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
           
            rekening::where("idrs",$id)->with("bank")->get();
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $dataTable;
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(rekening $rekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekening $rekening)
    {
        $dataTable = [];
        function checkifexist($column,$request_name,$request,$dataTable){
            if( ($request->has($request_name))){
               $databaru = addData($column,$request_name,$request,$dataTable);
               return $databaru;
            }
            else{
                return $dataTable;
            }
        }
        function addData($column,$request_name,$request,$dataTable){
            $dataTable[$column] = $request[$request_name];
            return $dataTable;
        }
        $dataTable = checkifexist("name","name",$request,$dataTable);
        $dataTable = checkifexist("no_rek","no_rek",$request,$dataTable);
        $dataTable = checkifexist("bank_id","bank_id",$request,$dataTable);
        $dataTable = checkifexist("branch_name","branch_name",$request,$dataTable);
        $dataTable = checkifexist("city","city",$request,$dataTable);
        try {
           
            rekening::findOrFail($id)->update($dataTable);
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $dataTable;
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekening $rekening)
    {
        try {
           
            rekening::findOrFail($id)->delete();
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = [];
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
        }
        return $data;
    }
}
