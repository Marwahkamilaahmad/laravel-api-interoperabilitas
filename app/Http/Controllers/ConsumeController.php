<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
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
        $dataLokal = Pasien::all();

        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pasien.tablePasien', compact('data', 'dataLokal'));
    }


    public function store(Request $request)
    {
        // Ambil data dari form
        $nama_pasien = $request->input('nama_pasien');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');
        $nama_wali = $request->input('nama_wali');
        $nomor_ruangan = $request->input('nomor_ruangan');
        $nama_dokter = $request->input('nama_dokter');

        // Buat array parameter untuk dikirim ke API
        $parameter = [
            'nama_pasien' => $nama_pasien,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'nama_wali' => $nama_wali,
            'nomor_ruangan' => $nomor_ruangan,
            'nama_dokter' => $nama_dokter,
        ];
        $pasien = new Pasien();
        $pasien->nama_pasien = $nama_pasien;
        $pasien->umur = $umur;
        $pasien->jenis_kelamin = $jenis_kelamin;
        $pasien->tanggal_lahir = $tanggal_lahir;
        $pasien->alamat = $alamat;
        $pasien->nama_wali = $nama_wali;
        $pasien->nomor_ruangan = $nomor_ruangan;
        $pasien->nama_dokter = $nama_dokter;
        $pasien->save();

        // Kirim permintaan POST ke API menggunakan GuzzleHttp Client
        $client = new Client();
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php";
        $response = $client->request('POST', $url, [
            'form_params' => $parameter,
        ]);
        // Ambil respons dari API
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
        $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::route('lihat-datapasien');
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

        $nama_pasien = $request->input('nama_pasien');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');
        $nama_wali = $request->input('nama_wali');
        $nomor_ruangan = $request->input('nomor_ruangan');
        $nama_dokter = $request->input('nama_dokter');

        $pasien = Pasien::findOrFail($id);

        // Perbarui nilai atribut pasien sesuai dengan data yang diterima dari permintaan
        $pasien->nama_pasien = $nama_pasien;
        $pasien->umur = $umur;
        $pasien->jenis_kelamin = $jenis_kelamin;
        $pasien->tanggal_lahir = $tanggal_lahir;
        $pasien->alamat = $alamat;
        $pasien->nama_wali = $nama_wali;
        $pasien->nomor_ruangan = $nomor_ruangan;
        $pasien->nama_dokter = $nama_dokter;

        // Simpan perubahan ke database
        $pasien->save();

        $parameter = [
            'nama_pasien' => $nama_pasien,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'nama_wali' => $nama_wali,
            'nomor_ruangan' => $nomor_ruangan,
            'nama_dokter' => $nama_dokter,
            'id' => $id
        ];


        $client = new Client();
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php?id=".$id;

        $response = $client->request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded', // Set tipe konten menjadi application/x-www-form-urlencoded
            ],
            'body' => http_build_query($parameter), // Gunakan http_build_query untuk mengonversi array parameter menjadi format x-www-form-urlencoded
        ]);

        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::route('lihat-datapasien');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $client = new Client();
        $pasien = Pasien::findOrFail($id);

        // Hapus data pasien dari database
        $pasien->delete();

        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php?id=".$id;
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        // if($contentArrays['status'] != true){
        //     $error = $contentArrays['message'];
        //     return Redirect::back()->withErrors($error);
        // }else{
            // dd(json_decode($content));
            return Redirect::back()->with('success', 'berhasil');
        // }

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
