<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

class HasilLab extends PermohonanLab
{
    /**
     * Sets diagnosticReport
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport[] $diagnosticReports diagnosticReport
     *
     * @return $this
     */
    public function setDiagnosticReports($diagnosticReports)
    {
        $this->data->setDiagnosticReport($diagnosticReports);

        return $this;
    }

    /**
     * Add diagnosticReport
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\DiagnosticReport $diagnosticReport diagnosticReport
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

    /**
     * Sets Observation
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Observation[] $observations Observation
     *
     * @return $this
     */
    public function setObservations($observations)
    {
        $this->data->setObservation($observations);

        return $this;
    }

    /**
     * Add Observation
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Observation $observation Obervation
     *
     * @return $this
     */
    public function addObservation($observation)
    {
        $observations = $this->data->getObservation();
        if (!$observations) {
            $observations = [$observation];
        } else {
            $observations[] = $observation;
        }
        $this->data->setObservation($observations);

        return $this;
    }

}