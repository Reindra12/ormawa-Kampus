<?php

namespace App\Http\Controllers;

use App\Models\HistoriPencarian;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoriPencarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = HistoriPencarian::orderBy('id','ASC')->get();
        $message = "List Histori Pencarian";
        return $this->responseSuccess($history, $message);
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
            'judul' => 'required',
            'id_mahasiswa'=> 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseError("",$message);
        }
        $id_mahasiswa = Mahasiswa::where('id_mahasiswa', $request->id_mahasiswa)->first();
        if ($id_mahasiswa==NULL) {
            $message = "Id Mahasiswa tidak ditemukan";
            return $this->responseError("", $message);
        };
        $message ="Berhasil menambahkan histori pencarian";
        $history = HistoriPencarian::create([
            'judul'=> $request->judul,
            'id_mahasiswa'=> $request->id_mahasiswa
        ]);

        return $this->responseSuccess($history, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriPencarian  $historiPencarian
     * @return \Illuminate\Http\Response
     */
    public function show($id_mahasiswa)
    {
        // $id_mahasiswa = HistoriPencarian::find('id_mahasiswa',$id_mahasiswa);
        $history = HistoriPencarian::where('id_mahasiswa',$id_mahasiswa)->first();
        $order = HistoriPencarian::orderBy('id','DESC')->get();
        if ($history==NULL) {
            $message = "history pencarian berdasarkan id tidak ditemukan";
            return $this->responseError("", $message);

        };
            $message = "List History pencarian berdasarkan Id Mahasiswa";
            return $this->responseSuccess($order, $message);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoriPencarian  $historiPencarian
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriPencarian $historiPencarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoriPencarian  $historiPencarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriPencarian $historiPencarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoriPencarian  $historiPencarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoriPencarian $historiPencarian)
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
            'message' => "Gagal menambahkan histori pencarian",
            'errors' => $messageError,
            'data'=> $data
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
