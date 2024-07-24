<?php

namespace Mediator\SatuSehat\Lib\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;

class OAuthClient extends Client
{
    public function __construct(Configuration $config)
    {
        $authClient = new Client([
            // URL for access_token request
            'base_uri' => $config->getAuthUrl(),
        ]);

        $authType = $config->getAuthType();
        if ($authType === 'credential') {
            $grantType = new ClientCredentials($authClient, [
                'client_id'     => $config->getClientId(),
                'client_secret' => $config->getClientSecret()
            ]);

            $oauth = new OAuth2Middleware($grantType);
            $stack = HandlerStack::create();
            $stack->push($oauth);

            $conf = [
                'base_uri'  => $config->getBaseUrl(),
                'handler'   => $stack,
                'auth'      => 'oauth',
            ];
        } elseif ($authType === 'bearar') {
            $conf = [
                'base_uri'  => $config->getBaseUrl(),
                'headers'   => [
                    'Authorization' => 'Bearer ' . $config->getBearerToken()
                ]
            ];
        } else {
            throw new Exception('The client_id and secret_id must be defined or use bearerToken', 100);
        }

        parent::__construct($conf);
    }
}
