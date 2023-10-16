<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;


class AbsenController extends Controller
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
        $validator = Validator::make($request->all(), [
            'status' =>['required', 'in:H,T'],
            'id_mahasiswa' => 'required',
            'id_kegiatan' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this-> responseError("",$message);
        }
        $id_mahasiswa = Mahasiswa::where('id_mahasiswa',$request->id_mahasiswa)->first();
        $id_kegiatan = Kegiatan::where('id_kegiatan',$request->id_kegiatan)->first();

        if ($id_mahasiswa ==NULL){
         return response()->json([
             'status' => true,
             'message' => 'OK!',
             'errors' => "id Mahasiswa tidak ditemukan",
             // 'data'=> $validatedData

         ],404);
        }

        if ($id_kegiatan ==NULL){
         return response()->json([
             'status' => true,
             'message' => 'OK!',
             'errors' => "id Kegiatan tidak ditemukan",
             // 'data'=> $validatedData

         ],404);
        }

        try {
            //code...
            $message = "Berhasil menambahkan Absensi";
            $ormawa = Absen::create([
                'id_mahasiswa' => $request->id_mahasiswa,
                'status' => $request->status,
                'id_kegiatan' => $request->id_kegiatan,

            ]);

            return $this->responseSuccess($ormawa, $message);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => 'Server Sedang Error',
                'errors' => $th->getMessage(),
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsenModel  $absenModel
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $Absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $Absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $Absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $Absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $Absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $Absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $Absen)
    {
        //
    }

    protected function responseSuccess($data, $message){
        return response()->json([
            'status' => true,
            'message' => $message,
            'errors' => null,
            'data' => $data
        ], 201);
    }

    protected function responseError($data,$messageError){
        return response()->json([
            'status' => false,
            'message' => $messageError,
            'errors' => $data,
            'data'=> $data
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
