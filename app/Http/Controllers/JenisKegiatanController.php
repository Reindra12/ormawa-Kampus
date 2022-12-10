<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;

class JenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_Kegiatan = JenisKegiatan::orderBy('id_jenis_kegiatan', 'DESC')->get()->map(function($kegiatan){
            return [
                'id' => $kegiatan->id_jenis_kegiatan,
                'nama_jenis_kegiatan'=> $kegiatan->nama_jenis_kegiatan,
                'gambar'=> $kegiatan->gambar_jenis_kegiatan
            ];
        });

        $response = [
            'status'=> 'success',
            'message' => 'List Jenis kegiatan',
            'error' => null,
            'data' => $jenis_Kegiatan
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
        $validator = Validator::make($request->all(), [
            'nama_jenis_kegiatan'=> 'required',
            'gambar_jenis_kegiatan'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'status'=> ['required', 'in:y,t']
        ]);

        if($validator->fails()){
            $message = $validator->errors()->first();
            return $this-> responseError("",$message);
        }

        // $namagambar = $request->file('jenis_kegiatan');
        $filename = Str::lower(
            pathinfo($request->file('gambar_jenis_kegiatan')->getClientOriginalName(), PATHINFO_FILENAME)
            .'.'
            .$request->file('gambar_jenis_kegiatan')->getClientOriginalExtension()
        );

        $request->file('gambar_jenis_kegiatan')->move(public_path('/assets/images/jenis_kegiatan'),$filename);

        $savedata = new JenisKegiatan;
        $savedata->nama_jenis_kegiatan = $request->nama_jenis_kegiatan;
        $savedata->gambar_jenis_kegiatan = $filename;
        // $savedata->status  = $request->status;

        $savedata->save();
            return response()->json([
                'status' => true,
                'message' => 'Jenis Kegiatan berhasil disimpan',
                'errors' => null,
                'data' => $savedata,

            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKegiatan $jenisKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKegiatan $jenisKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKegiatan $jenisKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKegiatan $jenisKegiatan)
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
            'errors' => true,
            'data'=> $data
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
