<?php

namespace App\Library;

use \GuzzleHttp\Client as HttpClient;

class Api
{
    public static function _sendGetRequest($url, $attributes = [], $type = "GET")
    {
        $client         = new HttpClient();
        $attributesSend = "";
        
        if(!empty($attributes)){
            $query = parse_url(env("API_SERVICE_ENDPOINT").$url, PHP_URL_QUERY);
            $attributesSend = (empty($query) ? "?" : "&") . http_build_query($attributes);
        }

        $response = $client->request($type, $url.$attributesSend);

        if ($response->getStatusCode() == 200) {
            return (json_decode((string) $response->getBody(),true));
        }

        \Log::erorr($response);

        return ["code" => 0, "data" => [], "message" => "Oops, something went wrong"];
    }

    public function _sendPostRequest( $url, $requests = [], $postAsJson = false)
    {
        info(env("API_SERVICE_ENDPOINT"));
        $client  = new HttpClient();
        $postKey = $postAsJson ? "json" : "form_params";
        if(!empty(\Auth::user()->c_id)) {
            $requests['client_id'] = \Auth::user()->c_id;
        }
        $response = $client->request('POST',
            env("API_SERVICE_ENDPOINT").$url,
            [
                $postKey => $requests,
            ]
        );

        if ($response->getStatusCode() == 200) {
            return (json_decode((string) $response->getBody(),true));
        }

        \Log::erorr($response);

        return ["code" => 0, "data" => [], "message" => "Oops, something went wrong"];
    }

    public static function sendWithFileRequest($type, $point, $params = [])
    {
        $client = new HttpClient();

        $response = $client->request($type, $point, [
            "multipart" => $params,
        ]);

        if ($response->getStatusCode() == 200) {
            return (json_decode((string) $response->getBody(),true));
        }

        \Log::erorr($response);

        return ["code" => 500, "data" => [], "message" => "Oops, something went wrong"];
    }
}

