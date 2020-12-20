<?php

namespace App\Helper;

use Exception;

class CallApiHelper
{

    protected static function url()
    {
        return config('custom.URL_API');
    }

    public static function getApi($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->request("GET", self::url() . $endpoint);
        $data = json_decode($request->getBody(), true);
        return $data;
    }


    public static function postApi($endpoint, $body)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->post(self::url() . $endpoint, [
                'body' => json_encode($body),
                // 'debug' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);

            $data = json_decode($request->getBody()->getContents(), true);
            return $data;
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public static function deleteApi($endpoint)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->delete(self::url() . $endpoint);
            // $response = $client->send($response);
            return $response;
        } catch (Exception $e) {
            print_r($e->getMessage());die();
        }
    }

    public static function putApi($endpoint, $body)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->put(self::url() . $endpoint, ['body' => $body]);
        // $response = $client->send($response);
        return $response;
    }
}
