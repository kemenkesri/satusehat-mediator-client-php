<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport;
use Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare;
use Mediator\SatuSehat\Lib\Client\Model\Observation;
use Mediator\SatuSehat\Lib\Client\Model\QuestionnaireResponse;
use Mediator\SatuSehat\Lib\Client\Model\TbConfirm;
use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;

class Diagnosis extends Terduga
{
    /** @var TbConfirm */
    protected $tbConfirm;

    /** @var ServiceRequest */
    protected $serviceRequest;

    /** @var Observation */
    protected $toraks;

    /** @var Observation */
    protected $observation;

    /** @var DiagnosticReport */
    protected $diagnosticReport;

    /** @var EpisodeOfCare */
    protected $episodeOfCare;

    /** @var QuestionnaireResponse */
    protected $questionnaireResponse;

    public function __construct($submitApi = null)
    {
        parent::__construct($submitApi);

        $this->tbConfirm = new TbConfirm();
        $this->serviceRequest = new ServiceRequest();
        $this->toraks = new Observation();
        $this->observation = new Observation();
        $this->diagnosticReport = new DiagnosticReport();
        $this->episodeOfCare = new EpisodeOfCare();
        $this->questionnaireResponse = new QuestionnaireResponse();
    }

    protected function mustValidated()
    {
        return [
            // 'TbSuspect',
            // 'TbConfirm',
            // 'Encounter',
            // 'EpisodeOfCare',
            // 'Observation',
            // 'DiagnosticReport',
            // 'QuestionnaireResponse',
        ];
    }

    /**
     * @return TbConfirm
     */
    public function getTbConfirm()
    {
        return $this->tbConfirm;    
    }

    /**
     * @return Observation
     */
    public function getObservation()
    {
        return $this->observation;    
    }

    /**
     * @return Observation
     */
    public function getXray()
    {
        return $this->toraks;    
    }

    /**
     * @return DiagnosticReport
     */
    public function getDiagnosticReport()
    {
        return $this->diagnosticReport;    
    }

    /**
     * @return EpisodeOfCare
     */
    public function getEpisodeOfCare()
    {
        return $this->episodeOfCare;    
    }

    /**
     * @return QuestionnaireResponse
     */
    public function getQuestionnaireResponse()
    {
        return $this->questionnaireResponse;
    }

    public function setServiceRequestId($id)
    {
        $this->serviceRequest->setId($id);

        return $this;
    }

    /**
     * @return $this
     */
    public function setTanggalHasilDiagnosis($datetime)
    {
        $this->observation->setIssued(self::isoDate($datetime, $this->config->getTimezone()));
        $this->diagnosticReport->setIssued(self::isoDate($datetime, $this->config->getTimezone()));

        return $this;
    }

    /**
     * @return $this
     */
    public function setXrayHasil($hasil)
    {
        $this->toraks->setValue($hasil);
        return $this;
    }

    /**
     * @return $this
     */
    public function setXrayTanggalWaktu($datetime)
    {
        $this->toraks->setEffectiveDateTime(self::isoDate($datetime, $this->config->getTimezone()));
        return $this;
    }

    /**
     * @return $this
     */
    public function setXrayKesan($kesan)
    {
        $this->diagnosticReport->setConclusionText($kesan);

        return $this;
    }

    public function setStatusPengobatan($status_pengobatan)
    {
        $this->tbConfirm->setStatusPengobatan($status_pengobatan);

        return $this;
    }

    /**
     * @return $this
     */
    public function setLokasiAnatomi($lokasiAnatomi)
    {
        $this->questionnaireResponse->setLocationAnatomy($lokasiAnatomi);
        return $this;
    }

    /**
     * @return $this
     */
    public function setHasilDiagnosis($hasil = null)
    {
        if ($hasil === '3') {
            $this->episodeOfCare->setStatus('cancelled');
        } else {
            $this->episodeOfCare->setStatus('active');
        }
        $this->episodeOfCare->setTypeCode($hasil === '2' ? 'TB-RO' : 'TB-SO');
        return $this;
    }

    /**
     * @return $this
     */
    public function setTipeDiagnosis($diagnosis)
    {
        $this->observation->setValue($diagnosis);
        $this->observation->setTypeObservation('tipe_diagnosis');

        $this->questionnaireResponse->setTypeDiagnosis($diagnosis);
        return $this;
    }

    /**
     * @return $this
     */
    public function setTindakLanjutPengobatan($tindakLanjut)
    {
        $this->tbConfirm->setTindakLanjut($tindakLanjut);
        return $this;
    }

    /**
     * @return $this
     */
    public function setTempatPengobatan($faskes)
    {
        $this->tbConfirm->setFaskesPengobatan($faskes);
        return $this;
    }

    public function build()
    {
        parent::build();

        $observation = [];
        if ($this->toraks->getValue()) {
            $this->toraks->setTypeObservation('xray');
            $this->toraks->setDiagnosticReport('xray');
            $observation[] = $this->toraks;
        }

        if ($this->observation->getValue()) {
            $observation[] = $this->observation;
        }

        if ($this->diagnosticReport->getConclusionText()) {
            $this->diagnosticReport->setCodeReport('xray');
            $this->data->setDiagnosticReport([$this->diagnosticReport]);
        }

        if ($this->questionnaireResponse->getLocationAnatomy() || $this->questionnaireResponse->getTypeDiagnosis()) {
            $this->data->setQuestionnaireResponse([$this->questionnaireResponse]);
        }

        if ($this->episodeOfCare->getStatus()) {
            $this->data->setEpisodeOfCare($this->episodeOfCare);
        }

        $this->data->setTbConfirm($this->tbConfirm);
        $this->data->setServiceRequest($this->serviceRequest);
        $this->data->setObservation($observation);

        return $this;
    }
}
