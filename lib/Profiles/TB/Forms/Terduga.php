<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\Encounter;
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

    public function build()
    {
        if (empty($this->data->getCreated())) {
            $this->setCreated(date('Y-m-d H:i:s'));
        }

        $encounter = $this->data->getEncounter();
        if ($encounter instanceof Encounter) {
            if ($encounter->getLocalId()) {
                $localId = $encounter->getLocalId() . rand(10, 10000);
                $encounter->setLocalId($localId);
            }

            if ($encounter->getPeriodStart()) {
                $datetime = date('Y-m-d H:i:s', strtotime(rand(5, 60) . ' sec', strtotime($encounter->getPeriodStart())));
                $encounter->setPeriodStart(self::isoDate($datetime, $this->config->getTimezone()));
            }

            if ($encounter->getPeriodEnd()) {
                $datetime = date('Y-m-d H:i:s', strtotime(rand(61, 120) . ' sec', strtotime($encounter->getPeriodEnd())));
                $encounter->setPeriodEnd(self::isoDate($datetime, $this->config->getTimezone()));
            }
        } else {
            if ($encounter['local_id']) {
                $localId = $encounter['local_id'] . rand(10, 10000);
                $encounter['local_id'] = $localId;
            }

            if (isset($encounter['period_start'])) {
                $datetime = date('Y-m-d H:i:s', strtotime(rand(5, 60) . ' sec', strtotime($encounter['period_start'])));
                $encounter['period_start'] = self::isoDate($datetime, $this->config->getTimezone());
            }

            if (isset($encounter['period_end'])) {
                $datetime = date('Y-m-d H:i:s', strtotime(rand(61, 120) . ' sec', strtotime($encounter['period_end'])));
                $encounter['period_end'] = self::isoDate($datetime, $this->config->getTimezone());
            }
        }
        $this->data->setEncounter($encounter);

        if ($localId) {
            $condition = $this->data->getCondition();
            for ($i = 0; $i < count($condition); $i++) { 
                if ($condition[$i] instanceof Condition) {
                    $condition[$i]->setLocalId($localId);
                    /*if ($condition[$i]->getRecordDate()) {
                        $datetime = date('Y-m-d H:i:s',  strtotime(rand(5, 100) . ' sec',strtotime($condition[$i]->getRecordDate())));
                        $condition[$i]->setRecordDate(self::isoDate($datetime, $this->config->getTimezone()));
                    }*/
                } else {
                    $condition[$i]['local_id'] = $localId;
                    /*if (isset($condition[$i]['record_date'])) {
                        $datetime = date('Y-m-d H:i:s',  strtotime(rand(5, 100) . ' sec',strtotime($condition[$i]['record_date'])));
                        $condition[$i]['record_date'] = self::isoDate($datetime, $this->config->getTimezone());
                    }*/
                }
            }
        }
        $this->data->setCondition($condition);
    }
}
