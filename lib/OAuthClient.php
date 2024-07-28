<?php

namespace Mediator\SatuSehat\Lib\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Uri;
use kamermans\OAuth2\OAuth2Middleware;
use Mediator\SatuSehat\Lib\Client\Vendor\ClientCredentials;

class OAuthClient extends Client
{
    public function __construct(Configuration $config)
    {
        $authType = $config->getAuthType();

        if ($authType === 'credential') {
            // Modify the base URI with the grant type query parameter
            $baseUri = new Uri($config->getAuthUrl());
            $baseUri = $baseUri->withQuery(http_build_query(['grant_type' => 'client_credentials']));

            $authClient = new Client([
                // URL for access_token request
                'base_uri' => $baseUri,
                'debug' => false,
            ]);

            $grantType = new ClientCredentials($authClient, [
                'client_id'     => $config->getClientId(),
                'client_secret' => $config->getClientSecret(),
                'auth_url'      => (string) $baseUri,
            ]);

            $oauth = new OAuth2Middleware($grantType);

            $stack = HandlerStack::create();
            $stack->push($oauth);
            $conf = [
                'base_uri'  => $config->getBaseUrl(),
                'handler'   => $stack,
                'auth'      => 'oauth',
                'debug'     => $config->getDebug(),
            ];
        } elseif ($authType === 'bearer') {
            $conf = [
                'base_uri'  => $config->getBaseUrl(),
                'debug'     => $config->getDebug(),
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
