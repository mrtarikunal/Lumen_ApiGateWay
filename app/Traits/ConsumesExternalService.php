<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService

{
    public function performRequest($method, $requestUrl, $formParams=[], $headers=[])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if(isset($this->secret)) {

           // author ve book microservice secret key yolluyrz onaylanmış bir bağlantı kurmak için.
           $headers['Authorization'] = $this->secret;
        }

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
