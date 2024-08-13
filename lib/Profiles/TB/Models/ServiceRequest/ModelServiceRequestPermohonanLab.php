<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Models\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Validation;

class ModelServiceRequestPermohonanLab extends Validation
{
    protected $serviceRequest;

    public function __construct()
    {
        $this->serviceRequest = new ServiceRequest();
    }

    protected function mustValidated()
    {
        return [];
    }

    public function setTanggalPermohonan($tanggal)
    {
        $this->serviceRequest->setRequestedTime($tanggal);

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

    public function setJenisPemeriksaan($jenisLab)
    {
        $this->serviceRequest->setCodeRequest($jenisLab);

        return $this;
    }

    public function getData()
    {
        return $this->serviceRequest;
    }

}