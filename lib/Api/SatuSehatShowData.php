<?php

namespace Mediator\SatuSehat\Lib\Client\Api;

use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\OAuthClient;

class SatuSehatShowData
{

    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        $apiInstance = new OAuthClient(Configuration::getDefaultConfiguration());
        $response = $apiInstance->request('get', $this->url);

        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }
}
