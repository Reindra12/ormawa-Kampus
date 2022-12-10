<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Response as HttpResponse;


use function PHPUnit\Framework\isEmpty;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = kegiatan::orderBy('nama_kegiatan','DESC')->get()->map(function($kegiatan){
            return [
                    'id' => $kegiatan->id_kegiatan,
                   'nama_kegiatan' => $kegiatan->nama_kegiatan,
                   'diskripsi_kegiatan' => $kegiatan->diskripsi_kegiatan,
                   'gambar_kegiatan' => $kegiatan->gambar_kegiatan,
                   'tgl_kegiatan' => $kegiatan->tgl_kegiatan,
                   'jam_kegiatan' => $kegiatan-> jam_kegiatan,

            ];
        });
        $response = [
            'status'=> 'success',
            'message' => 'List kegiatan order by Nama kegiatan',
            'error' => null,
            'data' => $kegiatan
        ];

        return response()->json($response, HttpResponse::HTTP_OK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory(Request $request){

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
            'gambar_kegiatan' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'diskripsi_kegiatan'=> 'required',
            'nama_kegiatan'=> 'required',
            'tgl_kegiatan' => 'required',
            'jam_kegiatan' => 'required',
            'id_ormawa' => 'required'

           ]);

           if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this-> responseError("",$message);
        }

        $filename = Str::lower(
            pathinfo($request->file('gambar_kegiatan')->getClientOriginalName(), PATHINFO_FILENAME)
            .'.'
            .$request->file('gambar_kegiatan')->getClientOriginalExtension()
        );

        $request->file('gambar_kegiatan')->move(public_path('/assets/images/kegiatan'),$filename);

           $id_ormawa = Ormawa::where('id_ormawa',$request->id_ormawa)->first();
           if ($id_ormawa ==NULL){
            return response()->json([
                'status' => true,
                'message' => 'OK!',
                'errors' => "id ormawa tidak ditemukan",
                // 'data'=> $validatedData

            ],404);
           }

           $save = new Kegiatan;
           $save->nama_kegiatan = $request->nama_kegiatan;
           $save->gambar_kegiatan = $filename;
           $save->diskripsi_kegiatan = $request->diskripsi_kegiatan;
           $save->tgl_kegiatan = $request->tgl_kegiatan;
           $save->jam_kegiatan = $request->jam_kegiatan;
           $save->id_ormawa = $request->id_ormawa;


           $save->save();

           $message = "Data berhasil ditambahkan";
           return $this->responseSuccess($save, $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
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


 function searchKegiatan($nama_kegiatan){
        $kegiatan = Kegiatan::where('nama_kegiatan','like',"%".$nama_kegiatan."%")->get();
        if($kegiatan==NULL){
            $message = "Data tidak ditemukan";
            return $this->responseError($kegiatan, $message);

        }else{
            $message = "Data ditemukan";
            return $this->responseError($kegiatan, $message);
        }
    }
}
