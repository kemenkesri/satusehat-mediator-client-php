<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\Model\AddressPatient;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\MediatorForm;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Terduga;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

final class AlamatPasien extends ProfileValidation
{
    /**
     * @param MediatorForm $form
     * @throws ValidationException
     */
    public function validate($form)
    {
        /** @var SubmitRequest $data */
        $data = $form->getData();
        /** @var TbSuspect $suspect */
        $suspect = $data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::create('TB_SUSPECT_REQUIRED');
        }

        if (!$suspect->getId() && $form instanceof Terduga) {
            /** @var Patient */
            $patient = $data->getPatient();
            if (!$patient || !$patient->getAddress() || count($patient->getAddress()) === 0) {
                throw ValidationException::create('TB_ADDRESS_REQUIRED');
            }

            /** @var AddressPatient[] */
            $address = $patient->getAddress();
            // print_r($address);exit;
            /** @var AddressPatient $add */
            foreach ($address as $add) {
                if (!$add->valid()) {
                    throw ValidationException::create('TB_ADDRESS_INVALID', $add->listInvalidProperties());
                }
            }
        }
    }
}
