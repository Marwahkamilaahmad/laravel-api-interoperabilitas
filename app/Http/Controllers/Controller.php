<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create(){
        return view('createpasien');
    }

    public function put(string $id){
        $client = new Client();
        $url = "http://localhost/sait_project_api_crud/mahasiswa_api.php?id=".$id;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('editpasien',['data'=>$data]);
    }

}
