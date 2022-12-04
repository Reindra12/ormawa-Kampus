<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ormawa = Ormawa::orderBy('nama_ormawa','DESC')->get()->map(function($orma){
            return [
                    'id' => $orma->id_ormawa,
                   'nama' => $orma->nama_ormawa,

            ];
        });
        $response = [
            'status'=> 'success',
            'message' => 'List Ormawa order by Nama Ormawa',
            'error' => null,
            'data' => $ormawa
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
            'nama_ormawa' => 'required',
            'status' => 'required',
            'user' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this-> responseError($message);
        }

        $nama = Ormawa::where('nama_ormawa',$request->nama_ormawa)->first();
        if ($nama==NULL){
            $ormawa = Ormawa::create([
                'nama_ormawa' => $request->nama_ormawa,
                'status' => $request->status,
                'user' => $request->user,
                'password' => Hash::make($request->password)
            ]);

            return $this->responseSuccess($ormawa);

        }
        $message = "Nama Ormawa sudah tersedia";
        return $this-> responseError($message);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function show(Ormawa $ormawa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function edit(Ormawa $ormawa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ormawa $ormawa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ormawa $ormawa)
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
