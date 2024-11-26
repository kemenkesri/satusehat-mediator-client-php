<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\CarePlan;
use Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare;
use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;

class HasilAkhir extends Terduga
{
    /** @var EpisodeOfCare */
    protected $episodeOfCare;

    /** @var CarePlan */
    protected $careplan;

    /** @var ServiceRequest */
    protected $serviceRequest;

    public function __construct($submitApi = null)
    {
        parent::__construct($submitApi);

        $this->episodeOfCare = new EpisodeOfCare();
        $this->careplan = new CarePlan();
        $this->serviceRequest = new ServiceRequest();
    }

    protected function mustValidated()
    {
        return [
            'EpisodeOfCare',
            'CarePlan',
            'ServiceRequest',
        ];
    }

    /**
     * Sets episodeId
     *
     * @param string $episodeId episodeId
     *
     * @return $this
     */
    public function setEpisodeOfCareId($episodeId)
    {
        $this->episodeOfCare->setId($episodeId);

        return $this;
    }

    /**
     * Sets tanggalAkhirPengobatan
     *
     * @param string $tanggalAkhirPengobatan tanggalAkhirPengobatan
     *
     * @return $this
     */
    public function setTanggalAkhirPengobatan($tanggalAkhirPengobatan)
    {
        $this->episodeOfCare->setStatus('finished');
        $this->episodeOfCare->setPeriodEnd(self::isoDate($tanggalAkhirPengobatan, $this->config->getTimezone()));

        return $this;
    }

    /**
     * Sets hasilAkhirPengobatan
     *
     * @param string $hasilAkhirPengobatan hasilAkhirPengobatan
     *
     * @return $this
     */
    public function setHasilAkhirPengobatan($hasilAkhirPengobatan)
    {
        $this->careplan->setOutcome($hasilAkhirPengobatan);

        return $this;
    }

    /**
     * Sets tanggalHarusKembali
     *
     * @param string $tanggalHarusKembali tanggalHarusKembali
     *
     * @return $this
     */
    public function setTanggalHarusKembali($tanggalHarusKembali, $tujuan = null)
    {
        $this->serviceRequest->setOccurrenceTime(self::isoDate($tanggalHarusKembali, $this->config->getTimezone()));
        if ($tujuan)
            $this->serviceRequest->setCodeRequest($tujuan);

        return $this;
    }

    public function build()
    {
        parent::build();

        if ($this->episodeOfCare->getStatus()) {
            $this->data->setEpisodeOfCare($this->episodeOfCare);
        }
        if ($this->careplan->getOutcome()) {
            $this->data->setCareplan($this->careplan);
        }
        if ($this->serviceRequest->getOccurrenceTime()) {
            $this->data->setServiceRequest($this->serviceRequest);
        }

        return $this;
    }
}