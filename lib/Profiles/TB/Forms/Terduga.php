<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms;

use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;

class Terduga extends MediatorForm
{
    /**
     * Sets tb_suspect
     *
     * @param TbSuspect $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect($tb_suspect)
    {
        $this->data->setTbSuspect($tb_suspect instanceof TbSuspect ? $tb_suspect : new TbSuspect($tb_suspect));

        return $this;
    }

}
