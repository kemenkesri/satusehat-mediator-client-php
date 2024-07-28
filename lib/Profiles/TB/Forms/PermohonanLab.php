<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

class PermohonanLab extends Terduga
{
    /**
     * Sets service_request
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\ServiceRequest[] $service_request service_request
     *
     * @return $this
     */
    public function setServiceRequest($service_request)
    {
        $this->data->setServiceRequest($service_request);

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
    public function addSpecimen($specimen)
    {
        $specimens = $this->data->getSpecimen();
        if (!$specimens) {
            $specimens = [$specimen];
        } else {
            $specimens[] = $specimen;
        }
        $this->data->setSpecimen($specimens);
        return $this;
    }

}