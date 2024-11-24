<?php

namespace App\Services;

use GuzzleHttp\Exception\ClientException;
use \Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;

class HttpService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public static function postRequest(string $url, array $data)
    {
        $client = new Client();
        $postResponse = $client->post($url, [
            'json' => $data,
            'verify' => false,
        ]);

        if ($postResponse->getStatusCode() === 200) {
            //self::saveResponseLog($data, $postResponse);
        }
        self::saveResponseLog($data, $postResponse);
        return json_decode($postResponse->getBody());
        return $postResponse;
    }

  
    private static function saveResponseLog(array $data, ResponseInterface $postResponse)
    {
        // Decodificar el cuerpo de la respuesta
        $responseBody = json_decode($postResponse->getBody(), true); // true para obtener un array asociativo
    
        // Registrar el log con los datos de la petición y la respuesta
        \Log::channel('responses-http')->info('HTTP Request', [
            'request_data' => $data,
            'response_status' => $postResponse->getStatusCode(),
            'response_body' => $responseBody,
        ]);
    }
}
