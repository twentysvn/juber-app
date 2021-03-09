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
            // return response()->json(['error'=>$validator->errors()], 401);       
            return response()->json([
                "success" => false,
                "code" => 500,
                "message" => $validator->errors()->first(),
                "file" => ''
            ]);
        }


        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('images');
            $file = substr($file, 7);
            //store your file into database
            // $document = new ();
            // $document->title = $file;
            // $document->user_id = $request->user_id;
            // $document->save();

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
    public function destroy(Request $request,$id)
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
        return $data;
        } catch (\Throwable $th) {
            $data['code'] = 500;
            $data['success'] = true;
            $data['message'] = $th->getMessage();
            return $data;
        }
    }
}
