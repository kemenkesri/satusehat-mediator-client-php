<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Validations;

use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\ProfileValidation;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

final class PermohonanLab extends ProfileValidation
{
    private static $ALASAN_PEMERIKSAAN = [
        'pemeriksaan_diagnosis',
        'follow_up',
        'pemeriksaan_ulang',
        'akhir_pengobatan',
        'pemeriksaan_diagnosis_baseline',
    ];

    private static $LOKASI_ANATOMY = [
        'PTB',
        'EPTB'
    ];

    private static $JENIS_PEMERIKSAAN = [
        'mikroskopis',
        'tcm',
        'tcm_xdr',
        'lini_1',
        'lini_2',
        'biakan',
        'kepekaan',
        'tcm_bdmax',
        'pcr',
    ];

    private static $JENIS_CONTOH_UJI = [
        'dahak_pagi',
        'dahak_sewaktu',
        'lcs',
        'jaringan',
        'bajah',
        'bilas_lambung',
        'isolat',
        'lainnya',
    ];

    /**
     * @param SubmitRequest $data
     * @throws ValidationException
     */
    public function validate($data, $class = null)
    {
        if ($class !== 'Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\PermohonanLab') {
            return;
        }

        /** @var TbSuspect $suspect */
        $suspect = $data->getTbSuspect();
        if (!isset($suspect)) {
            throw ValidationException::create('TB_SUSPECT_REQUIRED');
        }

        if (!$suspect->getPersonId()) {
            throw ValidationException::create('TB_LAB_PERSON_REQUIRED');
        }

        if (empty($data->getServiceRequest())) {
            throw ValidationException::create(('TB_LAB_SERVICE_REQUEST_REQUIRED'));
        }

        if (empty($data->getSpecimen())) {
            throw ValidationException::create(('TB_LAB_SPECIMEN_REQUIRED'));
        }

        $serviceRequest = $data->getServiceRequest()[0];
        $specimen = $data->getSpecimen()[0];

        if (empty($serviceRequest->getReasonCode()) || !in_array($serviceRequest->getReasonCode(), self::$ALASAN_PEMERIKSAAN)) {
            throw ValidationException::create('TB_LAB_REASON', [], ['default' => implode("', '", self::$ALASAN_PEMERIKSAAN)]);
        }

        if (empty($suspect->getLocationAnatomy()) || !in_array($suspect->getLocationAnatomy(), self::$LOKASI_ANATOMY)) {
            throw ValidationException::create('TB_LAB_LOCATION_ANATOMY', [], ['default' => implode("', '", self::$LOKASI_ANATOMY)]);
        }

        if (empty($serviceRequest->getCodeRequest()) || !in_array($serviceRequest->getCodeRequest(), self::$JENIS_PEMERIKSAAN)) {
            throw ValidationException::create('TB_LAB_CODE_REQUEST', [], ['default' => implode("', '", self::$JENIS_PEMERIKSAAN)]);
        }

        if (empty($specimen->getTypeCode()) || !in_array($specimen->getTypeCode(), self::$JENIS_CONTOH_UJI)) {
            throw ValidationException::create('TB_LAB_SPECIMEN_CODE', [], ['default' => implode("', '", self::$JENIS_CONTOH_UJI)]);
        }
    }
}
