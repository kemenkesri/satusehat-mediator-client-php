<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Models\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\Specimen;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Validation;

class ModelSpecimenPermohonanLab extends Validation
{
    protected $specimen;
    private $config;

    public function __construct()
    {
        $this->specimen = new Specimen();
        $this->config = Configuration::getDefaultConfiguration();
    }

    protected function mustValidated()
    {
        return [];
    }

    public function setTanggalWaktuPengambilanContohUji($datetime)
    {
        $this->specimen->setCollectedTime($datetime . $this->config->getTimezone());

        return $this;
    }

    public function setTanggalWaktuPengirimanContohUji($datetime)
    {
        $this->specimen->setTransportedTime($datetime . $this->config->getTimezone());

        return $this;
    }

    public function setJenisContohUji($jenis)
    {
        $this->specimen->setTypeCode($jenis);

        return $this;
    }

    public function setJenisContohUjiLainnya($detail)
    {
        $this->specimen->setTypeDetail($detail);

        return $this;
    }

    public function getData()
    {
        return $this->specimen;
    }

}