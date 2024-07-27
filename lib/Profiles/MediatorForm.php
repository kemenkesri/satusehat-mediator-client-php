<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\submitApi;

abstract class MediatorForm
{
    /** @var SubmitDataApi */
    protected $submitApi;

    /** @var SubmitRequest */
    protected $data;

    public function __construct($submitApi)
    {
        $this->submitApi = $submitApi;
        $this->data = new SubmitRequest();
    }

    /**
     * @param SubmitRequest $data
     */
    public function setData($data)
    {
        $this->data = $data;
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
     * @param \Mediator\SatuSehat\Lib\Client\Model\PatientBasic $patient patient
     *
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->data->setPatient($patient);

        return $this;
    }

    public function send()
    {
        /** @var ValidationManager */
        $validtor = ValidationManager::instance();
        $validtor->setProfile($this->data->getProfile());
        $validtor->validate($this->data);

        // send using submitApi
        return $this->submitApi->syncPost($this->data);
    }
}
