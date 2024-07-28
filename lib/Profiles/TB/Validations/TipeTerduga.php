<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

final class TipeTerduga extends ProfileValidation
{
    public function validate($data)
    {
        /** @var TbSuspect $suspect */
        $suspect = $data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::instance('TB_SUSPECT_REQUIRED');
        }

        //TODO: harus 1 atau 2 terduga_tb_id
        //TODO: terduga_tb_id = 2, terduga_ro_id harus diisi
        //TODO: harus 1 atau 2 terduga_tb_id
    }
}
