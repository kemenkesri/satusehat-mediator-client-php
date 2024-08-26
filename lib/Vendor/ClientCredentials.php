<?php

namespace Mediator\SatuSehat\Lib\Client\Vendor;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use kamermans\OAuth2\GrantType\GrantTypeInterface;
use kamermans\OAuth2\Utils\Helper;
use kamermans\OAuth2\Utils\Collection;
use kamermans\OAuth2\Signer\ClientCredentials\SignerInterface;

/**
 * Client credentials grant type.
 *
 * @link http://tools.ietf.org/html/rfc6749#section-4.4
 */
class ClientCredentials implements GrantTypeInterface
{
    /**
     * The token endpoint client.
     *
     * @var ClientInterface
     */
    private $client;

    /**
     * Configuration settings.
     *
     * @var Collection
     */
    private $config;

    /**
     * @param ClientInterface $client
     * @param array $config
     */
    public function __construct($client, $config)
    {
        $this->client = $client;
        $this->config = Collection::fromConfig(
            $config,
            // Defaults
            [
                'client_secret' => '',
                'scope' => '',
            ],
            // Required
            [
                'client_id',
                'auth_url'
            ]
        );
    }

    public function getRawData(SignerInterface $clientCredentialsSigner, $refreshToken = null)
    {
        $url = $this->config['auth_url'];
        if (Helper::guzzleIs('>=', 6)) {
            $request = new Request(
                'POST',
                $url,
                [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ]
            );

        } else {
            $request = $this->client->createRequest('POST', null);
            $request->setBody($this->getPostBody());
        }

        $request = $clientCredentialsSigner->sign(
            $request,
            $this->config['client_id'],
            $this->config['client_secret']
        );
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'client_id' => 'EgBGlnIM5DLceDLl9cKBbsQa6PIaOGArwMCr5zSuJYkURUve',
                'client_secret' => 'NsL0ECP9LBTptVrqwPv9kdeRVpFwBhR13pjsFS52RTmYmQvjTCT4TenEO6RwbSuc',
            ],
        ];

        $response = $this->client->send($request, $options);
        $rawData = json_decode($response->getBody(), true);

        return is_array($rawData) ? $rawData : [];
    }

    /**
     * @return \kamermans\OAuth2\Utils\StreamInterface
     */
    protected function getPostBody()
    {
        if (Helper::guzzleIs('>=', '6')) {
            $data = [
                'client_id' => $this->config['client_id'],
                'client_secret' => $this->config['client_secret'],
            ];

            if ($this->config['scope']) {
                $data['scope'] = $this->config['scope'];
            }

            if (!empty($this->config['audience'])) {
                $data['audience'] = $this->config['audience'];
            }

            return Helper::streamFor(http_build_query($data, '', '&'));
        }

        $postBody = new PostBody();
        $postBody->replaceFields([
            'grant_type' => 'client_credentials'
        ]);

        if ($this->config['scope']) {
            $postBody->setField('scope', $this->config['scope']);
        }

        if (!empty($this->config['audience'])) {
            $postBody->setField('audience', $this->config['audience']);
        }

        return $postBody;
    }
}