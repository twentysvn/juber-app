<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = product::all();
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
        try {
            $dataTable = addData("mcid", "mcid", $request, $dataTable);
            $dataTable = addData("idrs", "idrs", $request, $dataTable);
            $dataTable = addData("name", "name", $request, $dataTable);
            $dataTable = addData("description", "description", $request, $dataTable);
            $dataTable = addData("category_id", "category_id", $request, $dataTable);
            $dataTable = addData("category_desc", "category_desc", $request, $dataTable);
            $dataTable = addData("price", "price", $request, $dataTable);
            $dataTable = addData("delivery_id", "delivery_id", $request, $dataTable);
            $dataTable = addData("delivery_desc", "delivery_desc", $request, $dataTable);
            $dataTable = addData("delivery_cost", "delivery_cost", $request, $dataTable);
            $dataTable = addData("weight", "weight", $request, $dataTable);
            $dataTable = addData("image_path", "image_path", $request, $dataTable);
            $dataTable = addData("active", "active", $request, $dataTable);

            $items = product::create($dataTable);
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = ["request_data" => $items];
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = product::where('idrs', $id)->get();
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

    public function getbyname(Request $request)
    {
        $id = $request->idrs;
        $search = $request->name;

        try {
            $result = product::where('idrs', $id)->where('name', 'LIKE', '%' . $search . '%')->get();
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataTable = [];
        try {
            $dataTable = checkifexist("mcid", "mcid", $request, $dataTable);
            $dataTable = checkifexist("idrs", "idrs", $request, $dataTable);
            $dataTable = checkifexist("name", "name", $request, $dataTable);
            $dataTable = checkifexist("description", "description", $request, $dataTable);
            $dataTable = checkifexist("category_id", "category_id", $request, $dataTable);
            $dataTable = checkifexist("category_desc", "category_desc", $request, $dataTable);
            $dataTable = checkifexist("price", "price", $request, $dataTable);
            $dataTable = checkifexist("delivery_id", "delivery_id", $request, $dataTable);
            $dataTable = checkifexist("delivery_desc", "delivery_desc", $request, $dataTable);
            $dataTable = checkifexist("delivery_cost", "delivery_cost", $request, $dataTable);
            $dataTable = checkifexist("weight", "weight", $request, $dataTable);
            $dataTable = checkifexist("image_path", "image_path", $request, $dataTable);
            $dataTable = checkifexist("active", "active", $request, $dataTable);

            $items = product::where('id', $id)->get()->first()->update($dataTable);
            $data["success"] = true;
            $data["code"] = 200;
            $data["message"] = "berhasil";
            $data["data"] = ["request_data" => $items];
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}

function checkifexist($column, $request_name, $request, $dataTable)
{
    if ($request->has($request_name)) {
        $databaru = addData($column, $request_name, $request, $dataTable);
        return $databaru;
    } else {
        return $dataTable;
    }
}
function addData($column, $request_name, $request, $dataTable)
{
    $dataTable[$column] = $request[$request_name];
    return $dataTable;
}
