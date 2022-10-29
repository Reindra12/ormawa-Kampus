<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        //
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
            return $this-> responseError($message);
        }
    
           $name = $request->file('gambar_kegiatan')->getClientOriginalName();
    
           $image = $request->file('gambar_kegiatan')->store('/assets/images/categories');
           $path = $request->file('gambar_kegiatan')->move(public_path('/assets/images/categories'),$name);
    
    

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
           $save->gambar_kegiatan = $image;
           $save->diskripsi_kegiatan = $request->diskripsi_kegiatan;
           $save->tgl_kegiatan = $request->tgl_kegiatan;
           $save->jam_kegiatan = $request->jam_kegiatan;
           $save->id_ormawa = $request->id_ormawa;
           
           
           $save->save();
    
           return response()->json([
               'status' => true,
               'message' => 'OK!',
               'errors' => null,
               'data'=> $save  
               
           ],200);
    
        
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
