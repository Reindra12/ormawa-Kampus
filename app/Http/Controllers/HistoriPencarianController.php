<?php

namespace App\Http\Controllers;

use App\Models\HistoriPencarian;
use Illuminate\Http\Request;

class HistoriPencarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = HistoriPencarian::orderBy('id','ASC')->get()->all();
        $message = "List Histori Pencarian";
        return $this->responseSuccess($message, $history);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriPencarian  $historiPencarian
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriPencarian $historiPencarian)
    {
        //
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
            'message' => $messageError,
            'errors' => $data,
            'data'=> $data
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
