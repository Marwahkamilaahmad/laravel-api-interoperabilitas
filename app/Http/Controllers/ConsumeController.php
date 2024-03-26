<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConsumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pasien.tablePasien', compact('data'));
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
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php";
        $response = $client->request('POST',$url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::back()->with('success', 'berhasil');
        }

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
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php/$id";
        $response = $client->request('PUT',$url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::back()->with('success', 'berhasil');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::back()->with('success', 'berhasil');
        }

    }
}





// <?php

// namespace App\Http\Controllers;

// use GuzzleHttp\Client;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;

// class ConsumeController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $client = new Client();
//         $url = "http://127.0.0.1:8000/api/pasien";
//         $response = $client->request('GET', $url);
//         $content = $response->getBody()->getContents();
//         $contentArray = json_decode($content, true);
//         $data = $contentArray['data'];
//         return view('pasien.tablePasien', ['data'=>$data]);
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $nama_pasien = $request->nama_pasien;
//         $umur = $request->umur;
//         $jenis_kelamin = $request->jenis_kelamin;
//         $tanggal_lahir = $request->tanggal_lahir;

//         $parameter = [
//             'nama_pasien' => $nama_pasien,
//             'umur' => $umur,
//             'jenis_kelamin' => $jenis_kelamin,
//             'tanggal_lahir' => $tanggal_lahir,
//         ];

//         $client = new Client();
//         $url = "http://127.0.0.1:8000/api/pasien";
//         $response = $client->request('POST',$url, [
//             'headers' => ['Content-type' => 'application/json'],
//             'body' => json_encode($parameter)
//         ]);
//         $content = $response->getBody()->getContents();
//         $contentArrays = json_decode($content, true);
//         if($contentArrays['status'] != true){
//             $error = $contentArrays['data'];
//             return Redirect::back()->withErrors($error);
//         }else{
//             return Redirect::back()->with('success', 'berhasil');
//         }

//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {

//         $nama_pasien = $request->nama_pasien;
//         $umur = $request->umur;
//         $jenis_kelamin = $request->jenis_kelamin;
//         $tanggal_lahir = $request->tanggal_lahir;

//         $parameter = [
//             'nama_pasien' => $nama_pasien,
//             'umur' => $umur,
//             'jenis_kelamin' => $jenis_kelamin,
//             'tanggal_lahir' => $tanggal_lahir,
//         ];

//         $client = new Client();
//         $url = "http://127.0.0.1:8000/api/pasien";
//         $response = $client->request('PUT',$url, [
//             'headers' => ['Content-type' => 'application/json'],
//             'body' => json_encode($parameter)
//         ]);
//         $content = $response->getBody()->getContents();
//         $contentArrays = json_decode($content, true);
//         if($contentArrays['status'] != true){
//             $error = $contentArrays['data'];
//             return Redirect::back()->withErrors($error);
//         }else{
//             return Redirect::back()->with('success', 'berhasil');
//         }

//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $client = new Client();
//         $url = "http://127.0.0.1:8000/api/pasien/".$id;
//         $response = $client->request('DELETE', $url);
//         $content = $response->getBody()->getContents();
//         $contentArrays = json_decode($content, true);
//         if($contentArrays['status'] != true){
//             $error = $contentArrays['data'];
//             return Redirect::back()->withErrors($error);
//         }else{
//             return Redirect::back()->with('success', 'berhasil');
//         }

//     }
// }
