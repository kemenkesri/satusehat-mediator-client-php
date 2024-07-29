<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport;
use Mediator\SatuSehat\Lib\Client\Model\Encounter;
use Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class HasilLab extends MediatorForm
{
    protected function mustValidated(): array
    {
        return [
            'TbSuspect',
            'Encounter',
            'EpisodeOfCare',
            'ServiceRequest',
            'Specimen',
            'Observation',
            'DiagnosticReport',
        ];
    }

    /**
     * Sets tb_suspect
     *
     * @param array $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect(array $tb_suspect): self
    {
        $this->data->setTbSuspect(!($tb_suspect instanceof TbSuspect) ? new TbSuspect($tb_suspect) : $tb_suspect);

        return $this;
    }

    /**
     * Sets encounter
     *
     * @param array $encounter encounter
     *
     * @return $this
     */
    public function setEncounter(array $encounter): self
    {
        $this->data->setEncounter(!($encounter instanceof Encounter) ? new Encounter($encounter) : $encounter);

        return $this;
    }

    /**
     * Sets encounter
     *
     * @param array $episodeOrCare encounter
     *
     * @return $this
     */
    public function setEpisodeOfCare(array $episodeOrCare): self
    {
        $this->data->setEpisodeOfCare(!($episodeOrCare instanceof EpisodeOfCare) ? new EpisodeOfCare($episodeOrCare) : $episodeOrCare);

        return $this;
    }

    /**
     * Sets service_request
     *
     * @param array $service_request service_request
     *
     * @return $this
     */
    public function setServiceRequest(array $service_request): self
    {
        $this->data->setServiceRequest($service_request);

        return $this;
    }

    /**
     * Sets specimen
     *
     * @param array $specimens specimen
     *
     * @return $this
     */
    public function setSpecimen(array $specimens): self
    {
        $this->data->setSpecimen($specimens);

        return $this;
    }

    /**
     * Sets encounter
     *
     * @param array $observation encounter
     *
     * @return $this
     */
    public function setObservation(array $observation): self
    {
        $this->data->setObservation($observation);

        return $this;
    }

    /**
     * Sets diagnosticReport
     *
     * @param DiagnosticReport[] $diagnosticReports diagnosticReport
     *
     * @return $this
     */
    public function setDiagnosticReport(array $diagnosticReports): self
    {
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

    /**
     * Add diagnosticReport
     *
     * @param DiagnosticReport $diagnosticReport diagnosticReport
     *
     * @return $this
     */
    public function addDiagnosticReport($diagnosticReport)
    {
        $diagnosticReports = $this->data->getDiagnosticReport();
        if (!$diagnosticReports) {
            $diagnosticReports = [$diagnosticReport];
        } else {
            $diagnosticReports[] = $diagnosticReport;
        }
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

//    /**
//     * Sets Observation
//     *
//     * @param Observation[] $observations Observation
//     *
//     * @return $this
//     */
//    public function setObservations(array $observations)
//    {
//        $this->data->setObservation($observations);
//
//        return $this;
//    }
//
//    /**
//     * Add Observation
//     *
//     * @param array $observation Obervation
//     *
//     * @return $this
//     */
//    public function addObservation(array $observation)
//    {
//        $observations = $this->data->getObservation();
//        if (!$observations) {
//            $observations = [$observation];
//        } else {
//            $observations[] = $observation;
//        }
//        $this->data->setObservation($observations);
//
//        return $this;
//    }

}