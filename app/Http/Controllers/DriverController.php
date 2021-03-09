<?php

namespace App\Http\Controllers;

use App\Models\driver;
use App\Models\documents;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = driver::all();
            foreach ($result as $key => $value) {
                $result[$key]["documents"] = driver::find($value->id)->documents;
            }
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
            $req = ["idrs"=>$request->idrs,
                    "name"=>$request->name,
                    "phone"=>$request->phone,
                    "vhc_type"=>$request->vhc_type,
                    "vhc_brand"=>$request->vhc_brand,
                    "vhc_model"=>$request->vhc_model,
                    "vhc_plat"=>$request->vhc_plat,
                    "picture"=>$request->picture,
                     "token"=>$request->token
                    ];
            $driverCheck = driver::where("idrs",$request->idrs)->get();
            if(count($driverCheck)>0){
                $id = $driverCheck[0]["id"];
                $result = $driverCheck[0];
                documents::where("driver_id",$id)->delete();
            }else{
             $result = driver::create($req);
             $id = $result["id"];
            }
            $documents = [];
            foreach ($request->documents as $key => $value) {
                $docs = ["name"=>$value["name"],
                        "picture"=>$value["picture"],
                        "document_id"=>$value["document_id"],
                        "driver_id"=>$id];
                documents::create($docs);
                array_push($documents,$docs);
            }
            $result["documents"] = $documents;
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = driver::findOrFail($id);
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
    public function getByIdrs($id)
    {
        try {
            $result = driver::where('idrs',$id)->get();
            if(count($result)>0){
                $result[0]["documents"] = driver::find($result[0]->id)->documents;
            }
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        //
    }


    public function updateDriverStatus(Request $request, $id)
    {
        try {
            if($request->has('status')){
                $req = [
                    "status"=>$request->status,
                    ]; 
            }else{
                $req = [
                    "lat"=>$request->lat,
                    "long"=>$request->long,
                    ]; 
            }          
            $result = driver::findOrFail($id)->create($req);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        function isExist($name,$req,$request){
            if($request->has($name)){
                $req[$name] = $request[$name];
            }
            return $req;
        }
        try {
            $req = [];
            $req = isExist("idrs",$req,$request);
            $req = isExist("name",$req,$request);
            $req = isExist("phone",$req,$request);
            $req = isExist("vhc_type",$req,$request);
            $req = isExist("vhc_brand",$req,$request);
            $req = isExist("vhc_model",$req,$request);
            $req = isExist("vhc_plat",$req,$request);
            $req = isExist("picture",$req,$request);
            $req = isExist("token",$req,$request); 
            driver::findOrFail($id)->update($req);
            if($request->has("documents")){
                foreach ($request->documents as $key => $value) {
                    $docs = ["name"=>$value["name"],
                            "picture"=>$value["picture"],
                            "document_id"=>$value["document_id"]];
                    documents::where("name",$value["name"])->where("driver_id",$id)->update($docs);
                }
            }
            $result = driver::find($id);
            $result["documents"] = driver::find($id)->documents;
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
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            $driver = driver::findOrFail($id);
            $driverPicture = $driver["picture"];
            $documents = $driver->documents;
            $result = $driver->delete();
            \App::call('App\Http\Controllers\uploadController@destroy',
            ['id'=>$driverPicture]);
            foreach ($documents as $key => $value) {
                $picture = $value["picture"];
                \App::call('App\Http\Controllers\uploadController@destroy',
                ['id'=>$picture]);
            }
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
