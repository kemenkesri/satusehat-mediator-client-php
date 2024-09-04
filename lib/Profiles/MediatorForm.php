<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Model\AddressPatient;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Validation;

abstract class MediatorForm extends Validation
{
    protected $defaultRules = [
        'Profile' ,
        'OrganizationId' ,
        'LocationId' ,
        'PractitionerNik' ,
        'Patient',
    ];

    protected $config;

    /** @var SubmitDataApi */
    protected $submitApi;

    /** @var SubmitRequest */
    protected $data;

    /**
     * @param $submitApi
     */
    public function __construct($submitApi = null)
    {
        $this->config = Configuration::getDefaultConfiguration();
        $this->submitApi = $submitApi;
        $this->data = new SubmitRequest();
    }

    public function getConfig() {
        return $this->config;
    }

    public function setSubmitApi($submitApi)
    {
        $this->submitApi = $submitApi;
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
    public function setProfile($profile)
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
    public function setOrganizationId($organization_id)
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
    public function setLocationId($location_id)
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
    public function setPractitionerNik($practitioner_nik)
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
    public function setPatient($patient)
    {
        $this->data->setPatient($patient instanceof Patient ? $patient : new Patient($patient));

        return $this;
    }

    /**
     * Sets patient address
     *
     * @param AddressPatient|array $patient patient
     *
     * @return $this
     */
    public function setPatientAddress($patientAddress)
    {
        if (!$this->data->getPatient()) {
            return $this;
        }

        if (!($patientAddress instanceof AddressPatient)) {
            $patientAddress = new AddressPatient($patientAddress);
        }

        $addresses = $this->data->getPatient()->getAddress();
        if (empty($addresses)) {
            $addresses = [$patientAddress];
        } else {
            $addresses[] = $patientAddress;
        }

        $this->data->getPatient()->setAddress($addresses);

        return $this;
    }

    /**
     * @throws ValidationException
     * @throws \Exception
     * @return void
     */
    public function validate()
    {
        // validate required methods in Form Class
        $this->validatedMethod();

        // run Logical validation by use case profile (business process)
        /** @var ValidationManager $validator */
        $validator = ValidationManager::instance();
        $validator->setProfile($this->data->getProfile());
        $validator->validate($this);
    }

    abstract public function build();

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

    public static function isoDate($datetime, $timezone = '+00:00')
    {
        if (!$datetime) {
            return null;
        }

        return str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($datetime))) . $timezone;
    }
}
