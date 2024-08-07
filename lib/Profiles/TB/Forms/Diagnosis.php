<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport;
use Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare;
use Mediator\SatuSehat\Lib\Client\Model\Observation;
use Mediator\SatuSehat\Lib\Client\Model\QuestionnaireResponse;
use Mediator\SatuSehat\Lib\Client\Model\TbConfirm;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;

class Diagnosis extends Terduga
{
    /** @var TbSuspect */
    protected $tbSuspect;

    /** @var TbConfirm */
    protected $tbConfirm;

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

        $this->tbSuspect = new TbSuspect();
        $this->tbConfirm = new TbConfirm();
        $this->toraks = new Observation();
        $this->observation = new Observation();
        $this->diagnosticReport = new DiagnosticReport();
        $this->episodeOfCare = new EpisodeOfCare();
        $this->questionnaireResponse = new QuestionnaireResponse();
    }

    protected function mustValidated(): array
    {
        return [
            'TbSuspect',
            'TbConfirm',
            'Encounter',
            'EpisodeOfCare',
            'Observation',
            'DiagnosticReport',
            'QuestionnaireResponse',
        ];
    }

    /**
     * @return TbSuspect
     */
    public function getTbSuspect()
    {
        return $this->tbSuspect;    
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

    /**
     * @return $this
     */
    public function setTanggalHasilDiagnosis($datetime)
    {
        $this->observation->setIssued($datetime . $this->submitApi->getConfig()->getTimezone());
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
        $this->toraks->setEffectiveDateTime($datetime . $this->submitApi->getConfig()->getTimezone());
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
    public function setHasilDiagnosis($status, $hasil = null)
    {
        if ($status === 'cancelled') {
            $this->episodeOfCare->setStatus($status);
        } else {
            $this->episodeOfCare->setTypeCode($hasil);
            $this->episodeOfCare->setStatus($status);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function setTipeDiagnosis($diagnosis)
    {
        $this->observation->setValue($diagnosis);
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
        $observation = [];
        if ($this->toraks->getValue()) {
            $this->toraks->setTypeObservation('xray');
            $observation[] = $this->toraks;
        }

        if ($this->observation->getValue()) {
            $this->observation->setTypeObservation('tipe_diagnosis');
            $observation[] = $this->observation;
        }

        if ($this->diagnosticReport->getConclusionText()) {
            $this->diagnosticReport->setCodeReport('xray');
            $this->data->setDiagnosticReport([$this->diagnosticReport]);
        }

        if ($this->questionnaireResponse->getLocationAnatomy()) {
            $this->data->setQuestionnaireResponse([$this->questionnaireResponse]);
        }

        if ($this->episodeOfCare->getStatus()) {
            $this->data->setEpisodeOfCare($this->episodeOfCare);
        }

        $this->data->setTbSuspect($this->tbSuspect);
        $this->data->setTbConfirm($this->tbConfirm);
        $this->data->setObservation($observation);

        return $this;
    }
}
