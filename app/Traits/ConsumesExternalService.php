<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);


        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }


        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);

        return $response->getBody()->getContents();
    }

    public function performRequestWithFile($method, $requestUrl, $multipart, $headers = []){
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        //dd($multipart);

        $response = $client->request($method,$requestUrl,['headers' => $headers,'multipart' => $multipart]);

        return $response->getBody()->getContents();
    }
}
