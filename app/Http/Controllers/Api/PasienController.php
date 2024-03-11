<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pasien::orderBy('id','asc')->get();
        return response()->json([
            'status' => true,
            'message'=> 'data tersedia',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPasien = new Pasien();
        $dataPasien->nama_pasien = $request->nama_pasien;
        $dataPasien->umur = $request->umur;
        $dataPasien->jenis_kelamin = $request->jenis_kelamin;
        $dataPasien->tanggal_lahir = $request->tanggal_lahir;
        $dataPasien->alamat = $request->alamat;

        return response()->json([
            'status' => true,
            'message' => 'berhasil menambahkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pasien::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'data tersedia',
                'data' => $data
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'data tidak tersedia',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
