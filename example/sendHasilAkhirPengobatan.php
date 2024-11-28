<?php

use GuzzleHttp\Exception\RequestException;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Diagnosis;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\HasilAkhir;

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

$form = new HasilAkhir($apiInstance);
$form->setProfile(['TB']);
$form->setOrganizationId('100011961');
$form->setLocationId('ef011065-38c9-46f8-9c35-d1fe68966a3e');
$form->setPractitionerNik('N10000001');
$patient = new Patient();
$patient->setNik("3515126510190001");
$patient->setName("FAUZIA HAYZA AHMAD");
$patient->setBirthDate("2019-10-25");

$form->setPatient($patient);
$form->setTbSuspect([
    "id" => "2405101601149056",
    // "person_id" => "1000001601149056",
    // "tgl_daftar" => "2024-05-24",
    // "asal_rujukan_id" => "3",
    "fasyankes_id" => "1000119617",
    "jenis_fasyankes_id" => "1",
    // "terduga_tb_id" => "1",
    // "terduga_ro_id" => null,
    // "tipe_pasien_id" => "1"
]);
$form->setEncounter([
    "encounter_id" => "83ef7e32-64f3-40a7-87c4-3cc59d44b4c6",
    "local_id" => "2024-05-24 09:27:26.405593+07",
    "classification" => "AMB",
    "period_start" => "2024-05-24T09:28:01+07:00",
    "period_in_progress" => "2024-05-24T09:58:01+07:00",
    "period_end" => "2024-05-24T10:58:01+07:00"
]);

$form->addCondition(
    (new Condition())
    ->setId('e552612b-9bd4-41fb-9677-90a12bc0cc1c')
    ->setCodeCondition("Z10")
);
$form
    ->setEpisodeOfCareId("83ef7e32-64f3-40a7-87c4-3cc59d44b4c6")
    ->setTanggalAkhirPengobatan('2024-05-24T09:28:01')
    ->setHasilAkhirPengobatan('1')
    ->build();
$form->validate();

try {
    $response = $form->send();
    dump($response);
} catch(RequestException $e) {
    // echo ' ABCDEF ' . json_encode($e->getResponseBody());
    print_r(json_encode(json_decode($e->getResponse()->getBody()->getContents()), JSON_PRETTY_PRINT));
}