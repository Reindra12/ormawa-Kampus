<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\detail_kegiatan;
use App\Models\Detail_ormawa;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class DetailKegiatanController extends Controller
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
        $detail_kegiatan = $request->all();

        $validator = Validator::make($request->all(), [
            'id_kegiatan' => 'required',
            'id_mahasiswa' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseError("", $message);

        }

        $data = detail_kegiatan::where('id_mahasiswa', $detail_kegiatan['id_mahasiswa'])
        ->where('id_kegiatan', $detail_kegiatan['id_kegiatan'])
        ->where('status', $detail_kegiatan['status'])
        ->first();

        if ($data) {
            return $this->responseError("OK", "Anda sudah terdaftar dikegiatan ini");

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
            $message = "Berhasil menambahkan detail kegiatan";
            $ormawa = detail_kegiatan::create([
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
     * @param  \App\Models\detail_kegiatan  $detail_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(detail_kegiatan $detail_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_kegiatan  $detail_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_kegiatan $detail_kegiatan) //ganti dengan id kegiatan
    {
        //lakukan validasi apakah id kegiatan & id mahasiswa terdapat di table kegiatan?.

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail_kegiatan  $detail_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kegiatan)//ganti dengan id kegiatan
    {
        //lakukan validasi apakah id kegiatan & id mahasiswa terdapat di table kegiatan?.
        $kegiatan = Kegiatan::find($id_kegiatan);

    }

    public function absenKegiatan(Request $request){

        $detail_kegiatan = $request->all();

        $validator = Validator::make($request->all(), [
            'id_kegiatan' => 'required',
            'id_mahasiswa' => 'required',
            // 'status' => 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseError("", $message);

        }

        $cekstatus = detail_kegiatan::where('id_mahasiswa', $detail_kegiatan['id_mahasiswa'])
        ->where('id_kegiatan', $detail_kegiatan['id_kegiatan'])
        ->where('status', 'H')
        ->first();

        $data = detail_kegiatan::where('id_mahasiswa', $detail_kegiatan['id_mahasiswa'])
        ->where('id_kegiatan', $detail_kegiatan['id_kegiatan'])
        // ->where('status', 'T')
        ->update(['status' => 'H']);

        if($cekstatus){
            return $this->responseSuccess($cekstatus, "Anda Sudah Absen");
        }

        if ($data) {
             return $this->responseSuccess($detail_kegiatan, "Absensi Berhasil");
        }
        return $this->responseError("ID tidak ditemukan", "anda tidak terdaftar dalam kegiatan ini");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_kegiatan  $detail_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_kegiatan $detail_kegiatan)
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
            // 'data'=> ""
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
