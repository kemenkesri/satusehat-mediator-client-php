<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

final class AlamatPasien extends ProfileValidation
{
    /** 
     * @param SubmitRequest $data
     **/
    public function validate($data)
    {
        /** @var TbSuspect $suspect */
        $suspect = $data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::instance('TB_SUSPECT_REQUIRED');
        }

        if (!$suspect->getId()) {
            /** @var Patient */
            $patient = $data->getPatient();
            if (!$patient || !$patient->getAddress()) {
                throw ValidationException::instance('TB_ADDRESS_REQUIRED');
            }
        }
    }
}
