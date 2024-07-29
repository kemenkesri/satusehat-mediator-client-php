<?php

return [
    'FIELDS_REQUIRED' => [
        'code'    => 4000,
        'message' => 'Fields is required'
    ],
    'TB_SUSPECT_REQUIRED' => [
        'code'    => 4001,
        'message' => 'Field \'tb_suspect\' required'
    ],
    'TB_SUSPECT_TYPE' => [
        'code'    => 4002,
        'message' => 'Field \'tb_suspect.terduga_tb_id\' must be \'1\' or \'2\''
    ],
    'TB_SUSPECT_RO_TYPE' => [
        'code'    => 4003,
        'message' => 'Field \'tb_suspect.terduga_ro_id\' must be \'1\' - \'12\''
    ],
    'TB_SUSPECT_PATIENT_TYPE' => [
        'code'    => 4004,
        'message' => 'Field \'tb_suspect.tipe_pasien_id\' required'
    ],
    'TB_SUSPECT_PATIENT_RO_TYPE' => [
        'code'    => 4005,
        'message' => 'Field \'tb_suspect.tipe_pasien_id\' for TB-RO invalid'
    ],
    'TB_ADDRESS_REQUIRED' => [
        'code'    => 4005,
        'message' => 'Field \'patient.address\' required'
    ],
    'TB_ADDRESS_INVALID' => [
        'code'    => 4005,
        'message' => 'Field \'patient.address\' invalid'
    ],
    'TB_LAB_PERSON_REQUIRED' => [
        'code'    => 4006,
        'message' => 'Field \'tb_suspect.person_id\' required'
    ],
    'TB_LAB_PERSON_REQUIRED' => [
        'code'    => 4007,
        'message' => 'Field \'tb_suspect.person_id\' required'
    ],
    'TB_LAB_SERVICE_REQUEST_REQUIRED' => [
        'code'    => 4008,
        'message' => 'Field \'service_request\' required'
    ],
    'TB_LAB_SPECIMEN_REQUIRED' => [
        'code'    => 4009,
        'message' => 'Field \'specimen\' required'
    ],
    'TB_LAB_REASON' => [
        'code'    => 4010,
        'message' => 'Field \'service_request.reason_code\' must be one of [ \'$default\' ]'
    ],
    'TB_LAB_LOCATION_ANATOMY' => [
        'code'    => 4011,
        'message' => 'Field \'tb_suspect.location_anatomy\' must be one of [ \'$default\' ]'
    ],
    'TB_LAB_CODE_REQUEST' => [
        'code'    => 4012,
        'message' => 'Field \'service_request.code_request\' must be one of [ \'$default\' ]'
    ],
    'TB_LAB_SPECIMEN_CODE' => [
        'code'    => 4013,
        'message' => 'Field \'specimen.type_code\' must be one of [ \'$default\' ]'
    ],
];