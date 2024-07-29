<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\ServiceRequest;
use Mediator\SatuSehat\Lib\Client\Model\Specimen;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class PermohonanLab extends MediatorForm
{
    protected function mustValidated(): array
    {
        return [
            'TbSuspect',
            'Encounter',
            'ServiceRequest',
            'Specimen',
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
        $this->data->setEncounter($encounter);

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
     * Add specimen
     *
     * @param Specimen $specimen specimen
     *
     * @return $this
     */
    public function addSpecimen($specimen): self
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