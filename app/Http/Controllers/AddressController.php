<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = address::all();
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $result;
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
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
        try {
           $dataTable = addData("name","name",$request,$dataTable);
           $dataTable = addData("address_title","address_title",$request,$dataTable);
           $dataTable = addData("long","long",$request,$dataTable);
           $dataTable = addData("lat","lat",$request,$dataTable);
           $dataTable = addData("idrs","idrs",$request,$dataTable);
           $dataTable = checkifexist("description","description",$request,$dataTable);

           $items = address::create($dataTable);
           $data["success"] = true;
           $data["code"] = 202;
           $data["message"] = "berhasil";
           $data["data"] = ["request_data"=>$items];
       
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
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = address::where("idrs",$id)->get();
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $result;
        
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
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        try {
           $dataTable = checkifexist("name","name",$request,$dataTable);
           $dataTable = checkifexist("address_title","address_title",$request,$dataTable);
           $dataTable = checkifexist("long","long",$request,$dataTable);
           $dataTable = checkifexist("lat","lat",$request,$dataTable);
           $dataTable = checkifexist("idrs","idrs",$request,$dataTable);
           $dataTable = checkifexist("description","description",$request,$dataTable);

           $items = address::findOrFail($id)->update($dataTable);
           $data["success"] = true;
           $data["code"] = 202;
           $data["message"] = "berhasil";
           $data["data"] = ["request_data"=>$items];
       
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
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = address::findOrFail($id)->delete();
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = $result;
        
        } catch (\Throwable $th) {
            $data["data"] = [];
            $data["success"] = false;
            $data["code"] = 500;
            $data["message"] = $th->getMessage();
        }
        return $data;
    }
}
