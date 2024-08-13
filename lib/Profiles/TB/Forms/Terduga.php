<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class Terduga extends MediatorForm
{
    protected function mustValidated()
    {
        return [
            'TbSuspect',
            'Encounter',
            'Condition',
        ];
    }

    /**
     * Sets tb_suspect
     *
     * @param array $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect($tb_suspect)
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
    public function setEncounter($encounter)
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
    public function setCondition($condition)
    {
        $this->data->setCondition($condition);

        return $this;
    }

    /**
     * Sets condition
     *
     * @param Condition $condition condition
     *
     * @return $this
     */
    public function addCondition($condition)
    {
        $conditions = $this->data->getCondition();
        if (empty($conditions)) {
            $conditions = [$condition];
        } else {
            $conditions[] = $condition;
        }
        $this->data->setCondition($conditions);

        return $this;
    }
}
