<?php 

namespace App\Helper;

class CallApiHelper
{
    // protected $url;

    // public function __construct()
    // {
    //     $this->url = env("URL_API", "http://localhost:8000/api/v1");
    // }

    public function GetApi($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get("http://localhost:8000/api/v1".$endpoint);
        $response = $request->getBody();
        return $response;
    }


    public function PostApi($endpoint, $body) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("POST", $this->url.$endpoint, ['body' => $body]);
        $response = $client->send($response);
        return $response;
    }

    public function DeleteApi($endpoint, $body) {
        $client = new \GuzzleHttp\Client();
        $response = $client->delete($this->url.$endpoint);
        $response = $client->send($response);
        return $response;
    }

    public function PutApi($url, $body) {
        $client = new \GuzzleHttp\Client();
        $response = $client->put($this->url.$endpoint, ['body' => $body]);
        $response = $client->send($response);
        return $response;
    }
}