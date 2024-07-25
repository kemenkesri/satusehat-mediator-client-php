# Client Library Mediator SATUSEHAT
Spesifikasi API ini merupakan contoh untuk menggunakan **Mediator Interoperabilitas SATUSEHAT** yang secara khusus ditujukan untuk mempercepat dan memudahkan proses interoperabilitas data Rekam Medis Elektronik (RME) antara sistem informasi di Fasilitas Kesehatan (Rumah Sakit, Puskesmas, Klinik, Laboratorium, dll) dengan Platform SATUSEHAT.  Mediator Interoperabilitas SATUSEHAT menyediakan format custom yang disederhanakan dari format HL7 FHIR sebagai perantara antara sistem RME dengan SATUSEHAT beserta sistem informasi kesehatan yang ada ditingkat nasional.

Package PHP ini digenerate secara otomatis menggunakan [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

## Requirements

PHP 7.4 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/kemenkesri/satusehat-mediator-client-php.git"
    }
  ],
  "require": {
    "kemenkesri/satusehat-mediator-client-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/satusehat-mediator-client-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

### Get Patient Info
```php
<?php
use Mediator\SatuSehat\Lib\Client\Api\PatientApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\GetPatientRequest;
use Mediator\SatuSehat\Lib\Client\OAuthClient;

require_once(__DIR__ . '/vendor/autoload.php');

$bearerToken = 'ABCD';
Configuration::setConfigurationConstant(
    'development',
    [
        'authUrl'       => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        'tokenUrl'      => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        'baseUrl'       => 'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        // 'clientId'      => $clientId,
        // 'clientSecret'  => $clientSecret,
        'bearerToken'   => $bearerToken,
    ]
);

$apiInstance = new PatientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new OAuthClient(Configuration::getDefaultConfiguration('development'))
);
$body = new GetPatientRequest();

try {
    $result = $apiInstance->patientPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PatientApi->patientPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Submit RME data
```php
<?php
use Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;
use Mediator\SatuSehat\Lib\Client\OAuthClient;
require_once(__DIR__ . '/vendor/autoload.php');

$bearerToken = 'ABCD';
Configuration::setConfigurationConstant(
    'development',
    [
        'authUrl'       => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        'tokenUrl'      => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        'baseUrl'       => 'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        // 'clientId'      => $clientId,
        // 'clientSecret'  => $clientSecret,
        'bearerToken'   => $bearerToken,
    ]
);

$apiInstance = new Mediator\SatuSehat\Lib\Client\Api\SubmitDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new OAuthClient(Configuration::getDefaultConfiguration('development'))
);
$body = new SubmitRequest(
    "profile" => [ "TB" ],
    "organization_id" => "100011961",
    "location_id" => "ef011065-38c9-46f8-9c35-d1fe68966a3e",
    "practitioner_nik" => "N10000001",
    "patient" => [
        "nik" => "3515120000000000",
        "name" => "ABCD",
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
);

try {
    $result = $apiInstance->syncPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubmitDataApi->syncPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*PatientApi* | [**patientPost**](docs/Api/PatientApi.md#patientpost) | **POST** /patient | Mengambil informasi terkait pasien
*SubmitDataApi* | [**syncPost**](docs/Api/SubmitDataApi.md#syncpost) | **POST** /sync | Kirim data RME ke Mediator dengan format Non-FHIR

## Documentation For Models

 - [ApiError](docs/Model/ApiError.md)
 - [CarePlan](docs/Model/CarePlan.md)
 - [Composition](docs/Model/Composition.md)
 - [Condition](docs/Model/Condition.md)
 - [DiagnosticReport](docs/Model/DiagnosticReport.md)
 - [DocumentStatus](docs/Model/DocumentStatus.md)
 - [Encounter](docs/Model/Encounter.md)
 - [EpisodeOfCare](docs/Model/EpisodeOfCare.md)
 - [GetPatientRequest](docs/Model/GetPatientRequest.md)
 - [GetPatientResponse](docs/Model/GetPatientResponse.md)
 - [Immunization](docs/Model/Immunization.md)
 - [Location](docs/Model/Location.md)
 - [MediatorResourceBasic](docs/Model/MediatorResourceBasic.md)
 - [Medication](docs/Model/Medication.md)
 - [MedicationIngredient](docs/Model/MedicationIngredient.md)
 - [MedicationStatement](docs/Model/MedicationStatement.md)
 - [Observation](docs/Model/Observation.md)
 - [ObservationComponent](docs/Model/ObservationComponent.md)
 - [Patient](docs/Model/Patient.md)
 - [PatientBasic](docs/Model/PatientBasic.md)
 - [Procedure](docs/Model/Procedure.md)
 - [QuestionnaireResponse](docs/Model/QuestionnaireResponse.md)
 - [SatuSehatResponse](docs/Model/SatuSehatResponse.md)
 - [ServiceRequest](docs/Model/ServiceRequest.md)
 - [Specimen](docs/Model/Specimen.md)
 - [SubmitRequest](docs/Model/SubmitRequest.md)
 - [SubmitResponse](docs/Model/SubmitResponse.md)
 - [TbConfirm](docs/Model/TbConfirm.md)
 - [TbSuspect](docs/Model/TbSuspect.md)

## Documentation For Authorization


## satusehat_auth

- **Type**: OAuth
- **Flow**: accessCode
- **Authorization URL**: https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1
- **Scopes**: 

## satusehat_bearer

- **Type**: HTTP bearer authentication


## Author



