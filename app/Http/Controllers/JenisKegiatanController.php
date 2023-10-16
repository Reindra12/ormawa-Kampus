<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;


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
    public function show($id)
    {
        $jeniskegiatan =  JenisKegiatan::join("kegiatans", 'kegiatans.id_jenis_kegiatan','=', 'jenis_kegaitans.id_jenis_kegiatan')
            ->select(
                "kegiatans.*",
                // "kegiatans.id_kegiatan",
                // "kegiatans.nama_kegiatan",
                // "kegiatans.diskripsi_kegiatan",
                // "kegiatans.gambar_kegiatan",
                // "kegiatans.tgl_kegiatan",
                // "kegiatans.jam_kegiatan",


            )
            ->where("jenis_kegiatans.id_jenis_kegiatan", $id)
            ->first();

        if ($jeniskegiatan == null) {
            $response = [
                'status' => true,
                'message' => "empty",
                'error' => "ID not found",
            ];
            return response()->json($response, HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $response = [
                'status' => 'success',
                'message' => 'Detail of Transaction resouce',
                'error' => null,
                'data' => $jeniskegiatan
            ];
            return response()->json($response, HttpResponse::HTTP_OK);
        }
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

    public function sendNotif(Request $request)
    {
        $topic = $request->topics;
        $SERVER_API_KEY = env('SERVER_API_KEY');

        $data = [
            'title' => 'Penugasan Baru',
            'body' => 'Anda memiliki penugasan baru, segera cek aplikasi mobil penugasan!',
            'content_available' => true,
            'android_channel_id' => 'ch1',
            // 'to' => $device_token, // for single device id
            'to' => '/topics/breakfast',
            // 'sound' => 'notificationpomi.mp3',
            'data' => [
                'title' => 'Penugasan Baru',
                'sound' => 'notificationpomi.mp3',
                'body' => 'Anda memiliki penugasan baru, segera cek aplikasi mobil penugasan!'
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
        // return $SERVER_API_KEY;
    }
}
