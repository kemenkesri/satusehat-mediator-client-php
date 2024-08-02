<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Model\Specimen;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Models\MapModel;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Models\ServiceRequest\ModelServiceRequestPermohonanLab;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Models\ServiceRequest\ModelSpecimenPermohonanLab;

class PermohonanLab extends Terduga
{
    /** @var ServiceRequest */
    protected $serviceRequest;

    /** @var Specimen */
    protected $specimen;

    /**
     * @param $submitApi
     */
    public function __construct($submitApi)
    {
        parent::__construct($submitApi);

        $this->serviceRequest = new ServiceRequest();
        $this->specimen = new Specimen();
    }

    /**
     * Sets serviceRequest
     *
     * @param array|MapModel|callable $callback
     * @return $this
     */
    public function setServiceRequest($serviceRequest)
    {
        $dataMap = $serviceRequest;
        if (is_callable($serviceRequest)) {
            $map = $serviceRequest(new MapModel(ModelServiceRequestPermohonanLab::class));
            $dataMap = $map->getMap();
        }

        if ($serviceRequest instanceof MapModel) {
            /** @var MapModel $serviceRequest */
            $dataMap = $serviceRequest->getMap();
        }

        $this->data->setServiceRequest($dataMap);

        return $this;
    }

    /**
     * Get specimen
     * 
     * @return Specimen
     */
    public function getSpecimen()
    {
        return $this->specimen;
    }

    /**
     * Add specimen
     *
     * @param array|MapModel|callable $specimens specimen
     *
     * @return $this
     */
    public function setSpecimens($specimens)
    {
        $dataMap = $specimens;
        if (is_callable($specimens)) {
            $map = $specimens(new MapModel(ModelSpecimenPermohonanLab::class));
            $dataMap = $map->getMap();
        }

        if ($specimens instanceof MapModel) {
            /** @var MapModel $specimens */
            $dataMap = $specimens->getMap();
        }

        $this->data->setSpecimen($dataMap);

        return $this;
    }


    public function setNomorSediaan($noSediaan)
    {
        $this->data->getTbSuspect()->setNoSediaan($noSediaan);

        return $this;
    }

    public function setDugaanLokasiAnatomi($lokasi)
    {
        $this->data->getTbSuspect()->setLocationAnatomy($lokasi);

        return $this;
    }

    public function setJenisPemeriksaan($jenisLab)
    {
        $this->serviceRequest->setCodeRequest($jenisLab);
        $codes = $this->specimen->getCodeRequest();
        if (empty($codes)) {
            $codes = [$jenisLab];
        } elseif (!in_array($jenisLab, $codes)) {
            $codes[] = $jenisLab;
        }
        $this->specimen->setCodeRequest($codes);

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

    public function build()
    {
        $this->setServiceRequest([$this->serviceRequest])
            ->setSpecimens([$this->specimen]);
    }
}