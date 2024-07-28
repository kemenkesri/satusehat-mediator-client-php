<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

final class TipeTerduga extends ProfileValidation
{
    private static $SITB_RO_TYPE_REFERENCE = [
        '1' => '4',
        '2' => '4',
        '3' => '7',
        '4' => '3',
        '5' => '3',
        '6' => '2',
        '7' => '5',
        '8' => '1',
        '9' => '9',
        '10' => '6',
        '11' => '2',
        '12' => '5',
    ];

    public function validate($data, $class = null)
    {
        /** @var TbSuspect $suspect */
        $suspect = $data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::create('TB_SUSPECT_REQUIRED');
        }

        if (!$suspect->getId()) {
            if (!$suspect->getTerdugaTbId()) {
                throw ValidationException::create('TB_SUSPECT_TYPE');
            }
        }

        if ($class !== 'Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Terduga') {
            return;
        }

        if ($suspect->getTerdugaTbId()) {
            //TODO: harus 1 atau 2 terduga_tb_id
            if (!in_array($suspect->getTerdugaTbId(), ['1', '2'])) {
                throw ValidationException::create('TB_SUSPECT_TYPE');
            }

            //TODO: terduga_tb_id = 2, ro harus diisi
            if ($suspect->getTerdugaTbId() === '2') {
                if (!$suspect->getTerdugaRoId() || !in_array($suspect->getTerdugaRoId(), ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'])) {
                    throw ValidationException::create('TB_SUSPECT_RO_TYPE');
                }
            }            
        }

        //TODO: tipe_pasien_id harus diisi
        if ($suspect->getTerdugaRoId() 
            && (!isset(self::$SITB_RO_TYPE_REFERENCE[$suspect->getTerdugaRoId()])
            || !$suspect->getTipePasienId()
            || self::$SITB_RO_TYPE_REFERENCE[$suspect->getTerdugaRoId()] !== $suspect->getTipePasienId())) {
            throw ValidationException::create('TB_SUSPECT_PATIENT_RO_TYPE');
        } elseif (!$suspect->getTipePasienId() || !in_array($suspect->getTipePasienId(), ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'])) {
            throw ValidationException::create('TB_SUSPECT_PATIENT_TYPE');
        }
    }
}
