<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\ValidationException;

final class TipeTeruga extends ProfileValidation
{
    /** @var SubmitRequest */
    private $data;
    public function validate($data)
    {
        /** @var TbSuspect $suspect */
        $suspect = $this->data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::instance('TB_SUSPECT_REQUIRED');
        }

        //TODO: harus 1 atau 2 terduga_tb_id
        //TODO: terduga_tb_id = 2, terduga_ro_id harus diisi
        //TODO: harus 1 atau 2 terduga_tb_id

        return true;
    }
}
