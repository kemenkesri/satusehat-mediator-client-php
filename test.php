<?php

use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;

require_once(__DIR__ . '/vendor/autoload.php');

$clientId = 'EgBGlnIM5DLceDLl9cKBbsQa6PIaOGArwMCr5zSuJYkURUve';
$clientSecret = 'NsL0ECP9LBTptVrqwPv9kdeRVpFwBhR13pjsFS52RTmYmQvjTCT4TenEO6RwbSuc';

// Optional: if we want to use sub-national mediator (ISL DKI or East Java CenterView)
Configuration::setConfigurationConstant(
    'development',
    new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
        authUrl: 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        tokenUrl: 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        baseUrl: 'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        clientId: $clientId,
        clientSecret: $clientSecret,
        //        bearerToken: 'RVWrblJr9uS1PHE5JGxLNIeLWpEK'
    )
);

$body = new SubmitRequest([
    "profile" => ["TB"],
    "organization_id" => "100011961",
    "location_id" => "ef011065-38c9-46f8-9c35-d1fe68966a3e",
    "practitioner_nik" => "N10000001",
    "patient" => [
        "nik" => "3515126510190001",
        "name" => "FAUZIA HAYZA AHMAD",
        "birthDate" => "2019-10-25",
        "address" => [
            [
                "use" => "temp", // temp = alamat domisili, home = alamat ktp
                "country" => "id",
                "province" => "35", // kode depdagri 2 digit untuk provinsi
                "city" => "3578", // kode depdagri 4 digit untuk kab/kota
                "district" => "357801", // kode depdagri 6 digit untuk kecamatan
                "village" => "3578011002", // kode depdagri 10 digit untuk kelurahan/desa
                "rt" => "",
                "rw" => "",
                "postal_code" => "-",
                "line" => ["alamat jalan dan informasi lainnya"]
            ]
        ],
    ],
    "tb_suspect" => [
        "tgl_daftar" => "2024-05-24",
        "asal_rujukan_id" => "3",
        "fasyankes_id" => "1000119617",
        "jenis_fasyankes_id" => "1",
        "terduga_tb_id" => "1",
        "terduga_ro_id" => null,
        "tipe_pasien_id" => "1",
        "status_dm_id" => "1",
        "status_hiv_id" => "3"
    ],
    "encounter" => [
        "encounter_id" => "83ef7e32-64f3-40a7-87c4-3cc59d44b4c6",
        "local_id" => "2024-05-24 09:27:26.405593+07",
        "classification" => "AMB",
        "period_start" => "2024-05-24T09:28:01+07:00",
        "period_in_progress" => "2024-05-24T09:58:01+07:00",
        "period_end" => "2024-05-24T10:58:01+07:00"
    ],
    "condition" => [
        [
            "id" => "2a073abe-1b17-441d-885c-206e8b966f5c",
            "code_condition" => "Z10"
        ]
    ]
]); // \Mediator\SatuSehat\Lib\Client\Model\SubmitRequest |

/** @var object{data: \Mediator\SatuSehat\Lib\Client\Model\SubmitResponse} $response */
$response = (new \Mediator\SatuSehat\Lib\Client\SubmitTB($body, 'development'))
    ->handle();

dump($response);