<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;
use Mediator\SatuSehat\Lib\Client\OAuthClient;

abstract class MediatorForm
{
    protected array $defaultRules = [
        'Profile' ,
        'OrganizationId' ,
        'LocationId' ,
        'PractitionerNik' ,
    ];


    /** @var SubmitRequest */
    protected SubmitRequest $data;

    public function __construct()
    {
        $this->data = new SubmitRequest();
    }

    /**
     * @param SubmitRequest $data
     */
    public function setData(SubmitRequest $data)
    {
        $this->data = $data;
    }

    /**
     * Sets profile
     *
     * @param array $profile
     *
     * @return $this
     */
    public function setProfile(array $profile): MediatorForm
    {
        $this->data->setProfile($profile);

        return $this;
    }

    /**
     * Sets organization_id
     *
     * @param string $organization_id
     *
     * @return $this
     */
    public function setOrganizationId(string $organization_id): MediatorForm
    {
        $this->data->setOrganizationId($organization_id);

        return $this;
    }

    /**
     * Sets location_id
     *
     * @param string $location_id location_id
     *
     * @return $this
     */
    public function setLocationId(string $location_id): MediatorForm
    {
        $this->data->setLocationId($location_id);

        return $this;
    }

    /**
     * Sets practitioner_nik
     *
     * @param string $practitioner_nik practitioner_nik
     *
     * @return $this
     */
    public function setPractitionerNik(string $practitioner_nik): MediatorForm
    {
        $this->data->setPractitionerNik($practitioner_nik);

        return $this;
    }

    /**
     * @return array
     */
    protected function validationRules(): array
    {
        return array_merge($this->defaultRules, $this->mustValidated());
    }

    /**
     * @throws GuzzleException
     * @throws ApiException
     * @throws \Exception
     * @return array|ModelInterface|SubmitResponse
     */
    public function send()
    {
        //        $validator = ValidationManager::instance();
        //        $validator->setProfile($this->data->getProfile());
        //        $validator->validate($this->data);
        $this->validate();

        $apiInstance = new SubmitDataApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new OAuthClient(Configuration::getDefaultConfiguration())
        );

        // send using submitApi
        return $apiInstance->syncPost($this->data);
    }

    /**
     * @throws \Exception
     * @return array
     */
    protected function validate(): array
    {
        $data = [];
        foreach ($this->validationRules() as $key => $validationRule) {
            $setter = "set{$validationRule}";
            if (!method_exists($this, $setter)) {
                throw new \Exception('Method for ' . $setter . '  does not exists', 500);
            }
            $getter = "get{$validationRule}";
            if (!method_exists($this->data, $getter)) {
                throw new \Exception('Method for ' . $getter . ' does not exists', 500);
            }

            $data[$key] = $this->data->{$getter}();
        }
        return $data;
    }

    abstract protected function mustValidated(): array;
}
