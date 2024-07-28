<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class Terduga extends MediatorForm
{
    protected function mustValidated(): array
    {
        return [
            'Patient',
            'TbSuspect',
            'Encounter',
            'Condition',
        ];
    }

    /**
     * Sets patient
     *
     * @param array $patient patient
     *
     * @return $this
     */
    public function setPatient(array $patient): Terduga
    {
        $this->data->setPatient($patient);

        return $this;
    }

    /**
     * Sets tb_suspect
     *
     * @param array $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect(array $tb_suspect): Terduga
    {
        $this->data->setTbSuspect($tb_suspect);

        return $this;
    }

    /**
     * Sets encounter
     *
     * @param array $encounter encounter
     *
     * @return $this
     */
    public function setEncounter(array $encounter): Terduga
    {
        $this->data->setEncounter($encounter);

        return $this;
    }

    /**
     * Sets condition
     *
     * @param array $condition condition
     *
     * @return $this
     */
    public function setCondition(array $condition): Terduga
    {
        $this->data->setCondition($condition);

        return $this;
    }
}
