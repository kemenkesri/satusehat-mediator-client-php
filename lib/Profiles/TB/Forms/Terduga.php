<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class Terduga extends MediatorForm
{
    /**
     * Sets tb_suspect
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\TbSuspect $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect($tb_suspect)
    {
        $this->data->setTbSuspect($tb_suspect);

        return $this;
    }

}
