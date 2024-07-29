<?php

use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\AddressPatient;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\OAuthClient;

require_once(__DIR__ . '/../vendor/autoload.php');

$clientId = 'EgBGlnIM5DLceDLl9cKBbsQa6PIaOGArwMCr5zSuJYkURUve';
$clientSecret = 'NsL0ECP9LBTptVrqwPv9kdeRVpFwBhR13pjsFS52RTmYmQvjTCT4TenEO6RwbSuc';

// Optional: if we want to use sub-national mediator (ISL DKI or East Java CenterView)
Configuration::setConfigurationConstant(
    'development',
    new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
        'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        $clientId,
        $clientSecret,
        //        bearerToken: 'RVWrblJr9uS1PHE5JGxLNIeLWpEK'
    )
);

$apiInstance = new SubmitDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new OAuthClient(Configuration::getDefaultConfiguration())
);

$hasilLab = new \Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\HasilLab($apiInstance);
$hasilLab->setProfile(['TB']);
$hasilLab->setOrganizationId('100011961');
$hasilLab->setLocationId('ef011065-38c9-46f8-9c35-d1fe68966a3e');
$hasilLab->setPractitionerNik('N10000001');

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

$hasilLab->setPatient($patient);
$hasilLab->setTbSuspect([
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
$hasilLab->setEncounter([
    "encounter_id" => "83ef7e32-64f3-40a7-87c4-3cc59d44b4c6",
    "local_id" => "2024-05-24 09:27:26.405593+07",
    "classification" => "AMB",
    "period_start" => "2024-05-24T09:28:01+07:00",
    "period_in_progress" => "2024-05-24T09:58:01+07:00",
    "period_end" => "2024-05-24T10:58:01+07:00"
]);

$hasilLab->setEpisodeOfCare([
    "type_code" => "TB-SO",
    "period_start" => "2023-05-13T07:50:19+00:00",
]);
$hasilLab->setServiceRequest([
    [
        "id" => "5aee1336-3bfc-4ab1-a8cc-2b703276a76a",
        "code_request" => "mikroskopis",
    ],
]);
$hasilLab->setSpecimen([
    [
        "id" => "e5768297-e08c-40c1-922c-296d4019ff8e",
        "code_request" => ["mikroskopis"],
        "reference" => "specimen_1",
    ],
]);
$hasilLab->setObservation([
    [
        "type_observation" => "mikroskopis",
        "issued" => "2022-11-19T08:00:00+00:00",
        "value" => "3",
        "service_request" => "mikroskopis",
        "specimen" => "specimen_1",
        "diagnostic_report" => "mikroskopis",
        "performer" => "N10000001",
    ],
]);
$hasilLab->setDiagnosticReport([
    [
        "identifier" => "1234",
        "code_report" => "mikroskopis",
        "issued" => "2022-11-15T02:00:00+00:01",
        "verifiedby" => "N10000001",
        "effectiveDateTime" => "2022-11-15T02:00:00+00:02",
        "service_request" => "mikroskopis",
        "specimen" => "specimen_1",
    ],
]);

$hasilLab->validate();

$response = $hasilLab->send();
dump($response);
