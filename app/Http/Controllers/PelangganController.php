<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PelangganController extends Controller
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
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_meteran' => 'required',
            'telp' => 'required',


        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseError("", $message);
        }


        $save = new Pelanggan;
        $save->nama_pelanggan = $request->nama_pelanggan;
        $save->alamat_pelanggan = $request->alamat_pelanggan;
        $save->nomor_meteran = $request->nomor_meteran;
        $save->telp = $request->telp;

        $save->qrcode = 'qrcode-' . $request->nama_pelanggan . '.png';
        $save->save();


        $idPelanggan = strval($save->id_pelanggan);
        $qrCode = QRCode::format('png')->size(400)->generate($idPelanggan);

        $filename = 'qrcode-' . $request->nama_pelanggan . '.png';
        $path = public_path('/assets/images/pelanggan/qrcode/' . $filename);
        file_put_contents($path, $qrCode);

        if (!$save->id_pelanggan) {
            return response('id pelanggan tidak ditemukan', 400);
        }
        return $this->responseSuccess($save, "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }

    protected function responseSuccess($data, $message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'errors' => null,
            'data' => $data

        ], 201);
    }

    protected function responseError($data, $messageError)
    {
        return response()->json([
            'status' => false,
            'message' => $messageError,
            'errors' => true,
            'data' => $data
            // 'errors' => 'Failed to process request'
        ], 401);
    }
}
