<?php

return [
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
    ]
];