<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ConsumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pasien.tablePasien.index', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $nama_pasien = $request->nama_pasien;
        $umur = $request->umur;
        $jenis_kelamin = $request->jenis_kelamin;
        $tanggal_lahir = $request->tanggal_lahir;

        $parameter = [
            'nama_pasien' => $nama_pasien,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,

        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pasien";
        $response = $client->request('POST',$url);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
