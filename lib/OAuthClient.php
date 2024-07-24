<?php

namespace Mediator\SatuSehat\Lib\Client;

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

        $grantType = new ClientCredentials($authClient, [
            'client_id'     => $config->getClientId(),
            'client_secret' => $config->getClientSecret()
        ]);

        $oauth = new OAuth2Middleware($grantType);
        $stack = HandlerStack::create();
        $stack->push($oauth);

        parent::__construct([
            'base_uri'  => $config->getBaseUrl(),
            'handler'   => $stack,
            'auth'      => 'oauth',
        ]);
    }
}
