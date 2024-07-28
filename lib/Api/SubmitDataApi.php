<?php
/**
 * SubmitDataApi
 * PHP version 5
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Swagger Mediator  SATUSEHAT
 *
 * Spesifikasi API ini merupakan contoh untuk menggunakan **Mediator Interoperabilitas SATUSEHAT** yang secara khusus ditujukan untuk mempercepat dan memudahkan proses interoperabilitas data Rekam Medis Elektronik (RME) antara sistem informasi di Fasilitas Kesehatan (Rumah Sakit, Puskesmas, Klinik, Laboratorium, dll) dengan Platform SATUSEHAT.  Mediator Interoperabilitas SATUSEHAT menyediakan format custom yang disederhanakan dari format HL7 FHIR sebagai perantara antara sistem RME dengan SATUSEHAT beserta sistem informasi kesehatan yang ada ditingkat nasional.
 *
 * OpenAPI spec version: 1.0.1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.59
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Mediator\SatuSehat\Lib\Client\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\HeaderSelector;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
use Mediator\SatuSehat\Lib\Client\ObjectSerializer;
use RuntimeException;
use stdClass;

/**
 * SubmitDataApi Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SubmitDataApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param OAuthClient $client
     * @param Configuration|null $config
     * @param HeaderSelector|null $selector
     */
    public function __construct(
        OAuthClient    $client,
        Configuration  $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client;
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation syncPost
     *
     * Kirim data RME ke Mediator dengan format Non-FHIR
     *
     * @param SubmitRequest $body body (required)
     *
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @return ModelInterface|array
     */
    public function syncPost(SubmitRequest $body): SubmitResponse
    {
        list($response) = $this->syncPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation syncPostWithHttpInfo
     *
     * Kirim data RME ke Mediator dengan format Non-FHIR
     *
     * @param SubmitRequest $body (required)
     *
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @return array of \Mediator\SatuSehat\Lib\Client\Model\SubmitResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function syncPostWithHttpInfo(SubmitRequest $body): array
    {
        $returnType = '\Mediator\SatuSehat\Lib\Client\Model\SubmitResponse';
        $request = $this->syncPostRequest($body);
        try {
            $options = $this->createHttpClientOption();
            $response = $this->client->send($request, $options);

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            if ($e instanceof RequestException) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Mediator\SatuSehat\Lib\Client\Model\SubmitResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 403:
                case 404:
                case 405:
                case 409:
                case 413:
                case 415:
                case 422:
                case 429:
                case 500:
                case 501:
                case 503:
                case 504:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Mediator\SatuSehat\Lib\Client\Model\ApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation syncPostAsync
     *
     * Kirim data RME ke Mediator dengan format Non-FHIR
     *
     * @param SubmitRequest $body (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function syncPostAsync(SubmitRequest $body): PromiseInterface
    {
        return $this->syncPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation syncPostAsyncWithHttpInfo
     *
     * Kirim data RME ke Mediator dengan format Non-FHIR
     *
     * @param SubmitRequest $body (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function syncPostAsyncWithHttpInfo(SubmitRequest $body): PromiseInterface
    {
        $returnType = '\Mediator\SatuSehat\Lib\Client\Model\SubmitResponse';
        $request = $this->syncPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'syncPost'
     *
     * @param SubmitRequest $body (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function syncPostRequest(SubmitRequest $body): Request
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $body when calling syncPost'
            );
        }

        $resourcePath = '/sync';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getBaseUrl() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
