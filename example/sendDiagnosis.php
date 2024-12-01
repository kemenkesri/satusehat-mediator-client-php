<?php

use GuzzleHttp\Exception\RequestException;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Diagnosis;

require_once(__DIR__ . '/../vendor/autoload.php');

// pilih salah satu kombinasi isikan $clientId dan $clientSecret atau cukup $bearerToken saja
$clientId = null;
$clientSecret = null;
$bearerToken = null;

// Optional: if we want to use sub-national mediator (ISL DKI or East Java CenterView)
Configuration::setConfigurationConstant(
    'development',
    new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
        'https://api-satusehat-stg.kemkes.go.id/oauth2/v1/accesstoken',
        'https://api-satusehat-stg.kemkes.go.id/oauth2/v1/refreshtoken',
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

$form = new Diagnosis($apiInstance);
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
    "fasyankes_id" => "1000119617",
    "jenis_fasyankes_id" => "1",
    // "tipe_pasien_id" => "1"
]);
$form->setEncounter([
    // "encounter_id" => "2cb74b5b-fa00-4c65-b25d-22d35a2e7f7f",
    "local_id" => "2024-11-24 09:27:26.405593+07",
    "classification" => "AMB",
    "period_start" => "2024-11-24T09:28:01+07:00",
    "period_in_progress" => "2024-11-24T09:58:01+07:00",
    "period_end" => "2024-11-24T10:58:01+07:00"
]);

$form->addCondition(
    (new Condition())
    // ->setId('0ee11462-2151-48ad-9faa-289ad2d5fae1')
    ->setCodeCondition("Z10")
);
$form
    ->setStatusPengobatan('not-started')
    ->setTanggalHasilDiagnosis('2024-11-24T09:28:01')
    ->setServiceRequest('N10000001')
    ->setXrayHasil('pos')
    ->setXrayTanggalWaktu('2024-11-24T09:28:01')
    ->setXrayKesan('ABCDEFGH')
    ->setLokasiAnatomi('PTB')
    ->setHasilDiagnosis('1')
    ->setTipeDiagnosis('tb-bac')
    ->setTindakLanjutPengobatan('1')
    ->setTempatPengobatan('1000119617')
    ->build();
$form->validate();

try {
    $response = $form->send();
    print_r(['payload'=> $form->getData(), 'response' => $response]);
} catch(RequestException $e) {
    print_r(['payload'=> $form->getData()]);
    print_r(json_encode(['error' => $e, 'response' => json_decode($e->getResponse()->getBody()->getContents())], JSON_PRETTY_PRINT ));
}