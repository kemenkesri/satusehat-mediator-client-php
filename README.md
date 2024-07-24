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

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Mediator\SatuSehat\Lib\Client\Api\PatientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Mediator\SatuSehat\Lib\Client\Model\GetPatientRequest(); // \Mediator\SatuSehat\Lib\Client\Model\GetPatientRequest | 

try {
    $result = $apiInstance->patientPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PatientApi->patientPost: ', $e->getMessage(), PHP_EOL;
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



