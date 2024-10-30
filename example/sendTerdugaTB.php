<?php

use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\AddressPatient;
use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Terduga;

require_once(__DIR__ . '/../vendor/autoload.php');

// pilih salah satu kombinasi isikan $clientId dan $clientSecret atau cukup $bearerToken saja
$clientId = null;
$clientSecret = null;
$bearerToken = null;

// Optional: if we want to use sub-national mediator (ISL DKI or East Java CenterView)
Configuration::setConfigurationConstant(
    'development',
    new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
        'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        $clientId,
        $clientSecret,
        $bearerToken,
        '+07:00'
    )
);

$apiInstance = new SubmitDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new OAuthClient(Configuration::getDefaultConfiguration())
);

$terduga = new Terduga($apiInstance);
$terduga->setProfile(['TB']);
$terduga->setOrganizationId('100011961');
$terduga->setLocationId('ef011065-38c9-46f8-9c35-d1fe68966a3e');
$terduga->setPractitionerNik('N10000001');

$patient = new Patient();
$patient->setNik("3515126510190001");
$patient->setName("FAUZIA HAYZA AHMAD");
$patient->setBirthDate("2019-10-25");
$patient->setAddress([new AddressPatient(
    [
        "use" => "temp", // temp = alamat domisili, home = alamat ktp
        // "country" => "id",
        "province" => "35", // kode depdagri 2 digit untuk provinsi
        "city" => "3578", // kode depdagri 4 digit untuk kab/kota
        "district" => "357801", // kode depdagri 6 digit untuk kecamatan
        "village" => "3578011002", // kode depdagri 10 digit untuk kelurahan/desa
        "rt" => "",
        "rw" => "",
        "postal_code" => "-",
        "line" => ["alamat jalan dan informasi lainnya"]
    ]
)]);

$terduga->setPatient($patient);
$terduga->setTbSuspect([
    "tgl_daftar" => "2024-05-24",
    "asal_rujukan_id" => "3",
    "fasyankes_id" => "1000119617",
    "jenis_fasyankes_id" => "1",
    "terduga_tb_id" => "1",
    "terduga_ro_id" => null,
    "tipe_pasien_id" => "1",
    "status_dm_id" => "1",
    "status_hiv_id" => "3"
]);
$terduga->setEncounter([
    "encounter_id" => "83ef7e32-64f3-40a7-87c4-3cc59d44b4c6",
    "local_id" => "2024-05-24 09:27:26.405593+07",
    "classification" => "AMB",
    "period_start" => "2024-05-24T09:28:01+07:00",
    "period_in_progress" => "2024-05-24T09:58:01+07:00",
    "period_end" => "2024-05-24T10:58:01+07:00"
]);
$terduga->addCondition((new Condition())->setCodeCondition('Z10'));

$terduga->build();
$terduga->validate();

$response = $terduga->send();
dump($response);