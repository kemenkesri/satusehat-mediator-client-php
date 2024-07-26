<?php

namespace Mediator\SatuSehat\Lib\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class OAuthClient extends Client
{
    public function __construct(string $environment = 'development', array $config = [])
    {
        parent::__construct($config);

        $config = Configuration::getDefaultConfiguration($environment);
        if (empty($config->getAccessToken())) {
            $url = "{$config->getAuthUrl()}?grant_type=client_credentials";

            $response = $this->tryAuth(
                method: 'POST',
                url: $url,
                data: [
                    'client_id' => $config->getClientId(),
                    'client_secret' => $config->getClientSecret()
                ],
                headers: [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            );

            if ($response['status'] === 200) {
                $config->setAccessToken($response['body']['access_token']);
            }
        }
    }

    /**
     * @deprecated
     * */
    //    public function __construct(Configuration $config)
    //    {
    //        $authClient = new Client([
    //            // URL for access_token request
    //            'base_uri' => $config->getAuthUrl() . '?grant_type=client_credentials',
    //        ]);
    //
    //        $grantType = new ClientCredentials($authClient, [
    //            'client_id' => $config->getClientId(),
    //            'client_secret' => $config->getClientSecret()
    //        ]);
    //
    //        $oauth = new OAuth2Middleware($grantType);
    //        $stack = HandlerStack::create();
    //        $stack->push($oauth);
    //
    //        parent::__construct([
    //            'base_uri' => $config->getBaseUrl(),
    //            'handler' => $stack,
    //            'auth' => 'oauth',
    //        ]);
    //
    //    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @param array $headers
     * @throws GuzzleException
     * @return array
     */
    public function tryAuth(string $method, string $url, array $data = [], array $headers = []): array
    {
        try {
            $options = ['form_params' => $data];
            $options['headers'] = $headers;

            $response = $this->request($method, $url, $options);

            $body = json_decode($response->getBody()->getContents(), true);

            return [
                'status' => $response->getStatusCode(),
                'body' => $body
            ];
        } catch (RequestException $e) {
            return [
                'status' => $e->getResponse() ? $e->getResponse()->getStatusCode() : 500,
                'error' => $e->getMessage(),
            ];
        }
    }
}
