<?php

use GuzzleHttp\Exception\RequestException;
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\PermohonanLab;

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

$form = new PermohonanLab($apiInstance);
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
    "id" => "2411101654557057",
    // "person_id" => "1000001601149056",
    "fasyankes_id" => "100006298",
    "jenis_fasyankes_id" => "1",
    "terduga_tb_id" => "1",
    "terduga_ro_id" => null,
    "tipe_pasien_id" => "1"
]);
$form->setEncounter([
    "id" => "9a14708d-58cd-4c45-8d12-deb242fc9c18",
    "local_id" => "185",
    "period_end" => "2024-11-01T02:56:55+00:00",
    "period_start" => "2024-11-01T02:56:49+00:00",
    "classification" => "AMB",
    "period_in_progress" => "2024-11-01T02:56:49+00:00"
]);
$form->addCondition(
    (new Condition())
    ->setId('6c95dc8c-2f01-442f-abdd-7fd41162b094')
    ->setCodeCondition("A08.4")
);
$form->setTanggalPermohonan("2024-11-01")
    ->setDokterPengirim('10018234772')
    ->setFaskesTunjuan('100025765')
    ->setTanggalWaktuPengambilanContohUji("2024-11-01T10:10:00")
    ->setTanggalWaktuPengirimanContohUji("2024-11-01T12:10:00")
    ->setAlasanPemeriksaan('pemeriksaan_diagnosis')
    ->setDugaanLokasiAnatomi('PTB')
    ->setJenisPemeriksaan('tcm')
    ->setJenisContohUji('dahak_sewaktu')
    ->build();

$form->validate();

try {
    $response = $form->send();
    print_r(['payload'=> $form->getData(), 'response' => $response]);
} catch(RequestException $e) {
    print_r(['payload'=> $form->getData()]);
    print_r(json_encode(['error' => $e, 'response' => json_decode($e->getResponse()->getBody()->getContents())], JSON_PRETTY_PRINT ));
}