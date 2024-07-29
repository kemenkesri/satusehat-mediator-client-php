<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;

abstract class MediatorForm
{
    /** @var SubmitDataApi */
    protected $submitApi;

    /** @var SubmitRequest */
    protected $data;

    private array $defaultRules = [
        'Profile' ,
        'OrganizationId' ,
        'LocationId' ,
        'PractitionerNik' ,
        'Patient',
    ];

    /**
     * @param $submitApi
     */
    public function __construct($submitApi)
    {
        $this->submitApi = $submitApi;
        $this->data = new SubmitRequest();
    }

    /**
     * @param array|SubmitRequest $data
     */
    public function setData($data)
    {
        $this->data = $data instanceof SubmitRequest ? $data : new SubmitRequest($data);
    }

    /**
     * @return SubmitRequest
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->data->__toString();
    }

    /**
     * Sets profile
     *
     * @param string[] $profile profile
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
     * @param string $organization_id organization_id
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
     * Sets patient
     *
     * @param Patient|array $patient patient
     *
     * @return $this
     */
    public function setPatient($patient): MediatorForm
    {
        $this->data->setPatient($patient instanceof Patient ? $patient : new Patient($patient));

        return $this;
    }

    /**
     * @throws ValidationException
     * @throws \Exception
     * @return void
     */
    public function validate(): void
    {
        // validate required methods in Form Class
        $this->validatedMethod();

        // run Logical validation by use case profile (business process)
        $validator = ValidationManager::instance();
        $validator->setProfile($this->data->getProfile());
        $validator->validate($this->data);
    }

    /**
     * @return array
     */
    protected function validationRules(): array
    {
        return array_merge($this->defaultRules, $this->mustValidated());
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function validatedMethod()
    {
        $dataMissing = [];
        foreach ($this->validationRules() as $key => $validationRule) {
            $setter = "set{$validationRule}";
            if (!method_exists($this, $setter)) {
                throw new \Exception('Method for ' . $setter . '  does not exists', 500);
            }
            $getter = "get{$validationRule}";
            if (!method_exists($this->data, $getter)) {
                throw new \Exception('Method for ' . $getter . ' does not exists', 500);
            }

            $dataReceive = $this->data->{$getter}();
            if (!$dataReceive){
                $dataMissing[] = $validationRule;
            }
        }

        if (count($dataMissing) > 0){
            throw new \Exception('Missing required data for ('. implode(' & ', $dataMissing) .')',500);
        }
    }


    /**
     * @throws GuzzleException
     * @throws ApiException
     * @return array|ModelInterface|SubmitResponse
     */
    public function send()
    {
        // send using submitApi
        return $this->submitApi->syncPost($this->data);
    }

    /**
     * @return array
     */
    abstract protected function mustValidated(): array;

}
