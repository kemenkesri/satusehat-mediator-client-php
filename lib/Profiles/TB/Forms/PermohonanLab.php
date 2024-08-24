<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Model\Specimen;

class PermohonanLab extends Terduga
{
    /** @var ServiceRequest */
    private $serviceRequest;

    /** @var Specimen */
    private $specimen;

    /**
     * @param $submitApi
     */
    public function __construct($submitApi = null)
    {
        parent::__construct($submitApi);

        $this->serviceRequest = new ServiceRequest();
        $this->specimen = new Specimen();
    }

    /**
     * Sets serviceRequest
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\ServiceRequest[] $serviceRequest serviceRequest
     *
     * @return $this
     */
    public function setServiceRequest($serviceRequest)
    {
        $this->data->setServiceRequest($serviceRequest);

        return $this;
    }

    /**
     * Sets specimen
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Specimen[] $specimens specimen
     *
     * @return $this
     */
    public function setSpecimens($specimens)
    {
        $this->data->setSpecimen($specimens);

        return $this;
    }

    /**
     * Add specimen
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Specimen $specimen specimen
     *
     * @return $this
     */
    protected function addSpecimen($specimen)
    {
        if (!($specimen instanceof Specimen)) {
            $specimen = new Specimen($specimen);
        }

        $specimens = $this->data->getSpecimen();
        if (empty($specimens)) {
            $specimens = [$specimen];
        } else {
            $specimens[] = $specimen;
        }
        $this->data->setSpecimen($specimens);
        return $this;
    }

    public function setTanggalPermohonan($tanggal)
    {
        $this->serviceRequest->setRequestedTime(self::isoDate($tanggal, $this->config->getTimezone()));

        return $this;
    }

    public function setDokterPengirim($idNakes)
    {
        $this->serviceRequest
            ->setRequesterType('Practitioner')
            ->setRequester($idNakes);

        return $this;
    }

    public function setFaskesTunjuan($orgId)
    {
        $this->serviceRequest->setFaskesTujuan($orgId);

        return $this;
    }

    public function setNomorSediaan($noSediaan)
    {
        $this->data->getTbSuspect()->setNoSediaan($noSediaan);

        return $this;
    }

    public function setTanggalWaktuPengambilanContohUji($datetime)
    {
        $this->specimen->setCollectedTime(self::isoDate($datetime, $this->config->getTimezone()));

        return $this;
    }

    public function setTanggalWaktuPengirimanContohUji($datetime)
    {
        $this->specimen->setTransportedTime(self::isoDate($datetime, $this->config->getTimezone()));

        return $this;
    }

    public function setAlasanPemeriksaan($alasan)
    {
        $this->serviceRequest->setReasonCode($alasan);

        return $this;
    }

    public function setFollowUpBulanKe($detail)
    {
        $this->serviceRequest->setReasonDetail($detail);

        return $this;
    }

    public function setPemeriksaanUlang($detail)
    {
        $this->serviceRequest->setReasonDetail($detail);

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
        parent::build();
        
        $this->setServiceRequest([$this->serviceRequest])
            ->setSpecimens([$this->specimen]);
    }
}