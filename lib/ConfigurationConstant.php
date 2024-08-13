<?php

namespace Mediator\SatuSehat\Lib\Client;

class ConfigurationConstant
{
    /** @var string */
    public $authUrl;
    /** @var string */
    public $tokenUrl;
    /** @var string */
    public $satusehatUrl;
    /** @var string */
    public $baseUrl;
    /** @var string|null */
    public $clientId;
    /** @var string|null */
    public $clientSecret;
    /** @var string|null */
    public $bearerToken;
    /** @var string|null */
    public $timezone;
    /** @var string|null */
    public $fileToken;

    public function __construct($authUrl, $tokenUrl, $satusehatUrl, $baseUrl, $clientId = null, $clientSecret = null, $bearerToken = null, $timezone = null, $fileToken = null)
    {
        if ($authUrl) {
            $this->authUrl = $authUrl;
        }
        if ($tokenUrl) {
            $this->tokenUrl = $tokenUrl;
        }
        if ($satusehatUrl) {
            $this->satusehatUrl = $satusehatUrl;
        }
        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }
        if ($clientId) {
            $this->clientId = $clientId;
        }
        if ($clientSecret) {
            $this->clientSecret = $clientSecret;
        }
        if ($bearerToken) {
            $this->bearerToken = $bearerToken;
        }
        $this->timezone = $timezone ? $timezone : '+07:00';
        $this->fileToken = $fileToken ? $fileToken : '/tmp/oauth-token';
    }

    public static function create($constant)
    {
        return new ConfigurationConstant($constant['authUrl'], $constant['tokenUrl'], $constant['satusehatUrl'], $constant['baseUrl'], $constant['clientId'], $constant['clientSecret'], $constant['bearerToken'], $constant['timezone']);
    }
}