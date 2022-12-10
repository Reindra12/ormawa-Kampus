<?php

namespace App\Http\Controllers;

use App\Models\Detail_jenis_kegiatan;
use App\Models\Jenis_Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;

class DetailJenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_jenis_kegiatan = Detail_jenis_kegiatan::orderBy('id_jenis_kegiatan','DESC')->get()->map(function($detail){
            return [
                'id_jenis_kegiatan'=> $detail->id_jenis_kegiatan,
                'point' => $detail->point,

            ];
        });

        $response = [
            'status'=> 'success',
            'message' => 'List Detail Jenis Kegiatan',
            'error' => null,
            'data' => $detail_jenis_kegiatan
        ];

        return response()->json($response, HttpResponse::HTTP_OK);
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
        $validator = Validator::make($request->all(),[
            'id_jenis_kegiatan'=> 'required',
            'point'=> 'required',
            'status'=> ['required', 'in:y,t']
        ]);

        if($validator->fails()){
            $message = $validator->errors()->first();
            return $this-> responseError($message);
        }

        $id_jenis_kegiatan = Jenis_Kegiatan::where('id_jenis_kegiatan', $request->id_jenis_kegiatan)->first();
        if($id_jenis_kegiatan==NULL){
            return response()->json([
                'status' => true,
                'message'=> 'OK!',
                'errors' => "id jenis kegiatan tidak ditemukan",
            ], 404);
        }else{
            $detail_jenis_kegiatan = Detail_jenis_kegiatan::create([
                'id_jenis_kegiatan'=> $request->id_jenis_kegiatan,
                'point'=> $request->point,
                'status'=> $request-> status
            ]);
            return $this->responSuccsess($detail_jenis_kegiatan);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail_jenis_kegiatan  $detail_jenis_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_jenis_kegiatan $detail_jenis_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail_jenis_kegiatan  $detail_jenis_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_jenis_kegiatan $detail_jenis_kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail_jenis_kegiatan  $detail_jenis_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_jenis_kegiatan $detail_jenis_kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail_jenis_kegiatan  $detail_jenis_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_jenis_kegiatan $detail_jenis_kegiatan)
    {
        //
    }


    protected function responseSuccess($ormawa){
        return response()->json([
            'status' => true,
            'message' => 'berhasil',
            'errors' => null,
            'data' => $ormawa
        ], 201);
    }

    protected function responseError($messageError){

        return response()->json([
            'status' => false,
            'message' => 'Cek kembali data anda',
            'errors' => $messageError,
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
