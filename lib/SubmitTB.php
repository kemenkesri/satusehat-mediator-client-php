<?php

namespace Mediator\SatuSehat\Lib\Client;

use Mediator\SatuSehat\Lib\Client\Abstracts\BaseAction;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;

class SubmitTB extends BaseAction
{
    protected SubmitDataApi $apiInstance;
    public ModelInterface $model;
    public string $environment;


    public function __construct(
        ModelInterface $model,
        string         $environment = 'development'
    ) {
        $this->model = $model;
        $this->environment = $environment;
        parent::__construct();
    }

    public function rules(): BaseAction
    {
        $this->apiInstance = new SubmitDataApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new OAuthClient(environment: $this->environment)
        );
        return $this;
    }

    /**
     * @return mixed
     */
    public function handle(): mixed
    {
        try {
            $result = $this->apiInstance->syncPost($this->model);
            $callbackResource = new CallbackResource(
                data: $result
            );
        } catch (\Throwable $e) {
            $callbackResource = new CallbackResource(
                status: 'failed',
                code: $e->getCode(),
                message: $e->getMessage(),
            );
        }

        return $callbackResource;
    }
}