<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class uploadController extends Controller
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

        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimes:png,jpg,webp,jpeg|max:10072',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "code" => 500,
                "message" => $validator->errors()->first(),
                "file" => ''
            ]);
        }

        if ($request->file('file')) {
            $file = $request->file->store('images');
            $file = substr($file, 7);
            return response()->json([
                "success" => true,
                "code" => 200,
                "message" => "File successfully uploaded",
                "file" => config('app.url') . "/storage/" . $file
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $path = $request->image;
            $APP_URL = config('app.url');
            $hostLength = strlen($APP_URL."/storage/");
            $imageFile =  substr($path, $hostLength, strlen($path));
            $Publicpath = public_path();
            $Publicpath = substr_replace($Publicpath, "", -7);
            $pathImage = $Publicpath . '/storage/app/images/' . $imageFile;
            unlink($pathImage);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil hapus image";
            $data['data'] = $path;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
        }

        return $data;
    }


    public function destroyImage($id)
    {
        try {
            $path = $id;
            $hostLength = strlen("http://192.168.3.8:1234/storage/");
            $imageFile =  substr($path, $hostLength, strlen($path));
            $Publicpath = public_path();
            $Publicpath = substr_replace($Publicpath, "", -7);
            $pathImage = $Publicpath . '/storage/app/images/' . $imageFile;
            unlink($pathImage);
            $data['code'] = 200;
            $data['success'] = true;
            $data['message'] = "berhasil hapus image";
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = false;
            $data['message'] = $th->getMessage();
        }
        return $data;
    }
}
