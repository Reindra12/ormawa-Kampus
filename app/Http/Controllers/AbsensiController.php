<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Validator;


class AbsensiController extends Controller
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
        $nama = $request->input('nama');
        $absensi = Absensi::create([
            'nama' => $nama,
            'status' => $request->input('status'),
            'id_mahasiswa' => $request->input('id_mahasiswa'),
            'id_kegiatan'=> $request->input('id_kegiatan'),
            'id_prodi' => $request->input('id_prodi')

        ]);


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

        $id_prodi = Prodi::where('id_prodi',$request->id_prodi)->first();
        if ($id_prodi ==NULL){
         return response()->json([
             'status' => true,
             'message' => 'OK!',
             'errors' => "id Prodi tidak ditemukan",
             // 'data'=> $validatedData

         ],404);
        }
        // $qrcode = QrCode::format('png')->size(500)->generate($nama);
        $qrcode = QrCode::generate('Welcome to Makitweb');

        // Store QR code for download
        QrCode::generate('Welcome to Makitweb', public_path('/assets/images/qrcode.svg') );

        // return view('index',$data);

        $absensi->qrcode_image = $qrcode;

        $absensi->id_mahasiswa = $id_mahasiswa;
        $absensi->id_kegiatan = $id_kegiatan;
        $absensi->id_prodi = $id_prodi;
        $absensi->save();


        return response()->json($qrcode);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
