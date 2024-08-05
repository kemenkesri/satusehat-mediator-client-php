<?php

use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRCodeableConcept;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRCoding;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRDateTime;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRIdentifier;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRReference;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRRequestIntent;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRRequestPriority;
use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRRequestStatus;
use DCarbone\PHPFHIRGenerated\R4\FHIRResource\FHIRDomainResource\FHIRServiceRequest;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\FHIR\ResourceApi;
use Mediator\SatuSehat\Lib\Client\OAuthClient;

require_once(__DIR__ . '/../vendor/autoload.php');

$clientId = 'EgBGlnIM5DLceDLl9cKBbsQa6PIaOGArwMCr5zSuJYkURUve';
$clientSecret = 'NsL0ECP9LBTptVrqwPv9kdeRVpFwBhR13pjsFS52RTmYmQvjTCT4TenEO6RwbSuc';

// Optional: if we want to use sub-national mediator (ISL DKI or East Java CenterView)
Configuration::setConfigurationConstant(
    'development',
    new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
        authUrl: 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
        tokenUrl: 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
        satusehatUrl: 'https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1',
        baseUrl: 'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        clientId: $clientId,
        clientSecret: $clientSecret,
        bearerToken: 'RVWrblJr9uS1PHE5JGxLNIeLWpEK',
        timezone: '+07:00'
    )
);

$apiInstance = new ResourceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new OAuthClient(Configuration::getDefaultConfiguration())
);

$sr = new FHIRServiceRequest();

$id = new FHIRIdentifier();
$sr->addIdentifier($id->setSystem('http://sys-ids.kemkes.go.id/servicerequest/' . $orgId)
    ->setValue($idRujukan))
    ->setStatus(new FHIRRequestStatus('active'))
    ->setIntent(new FHIRRequestIntent('original-order'))
    ->setPriority(new FHIRRequestPriority('routine'))
    ->addCategory(
        (new FHIRCodeableConcept())
            ->addCoding(
                (new FHIRCoding())
                    ->setSystem('http://snomed.info/sct')
                    ->setCode('108252007')
                    ->setDisplay('Laboratory procedure')
            )
    )
    ->setCode(
        (new FHIRCoding())
            ->setSystem('http://loinc.org')
            ->setCode('11477-7')
            ->setDisplay('Microscopic observation [Identifier] in Sputum by Acid fast stain')
    )
    ->setSubject((new FHIRReference())->setReference('Patient/100000030009'))
    ->setEncounter(
        (new FHIRReference())
        ->setReference("Encounter/{$Encounter_uuid}")
        ->setDisplay('Permintaan BTA Sputum Budi Santoso di hari Selasa, 14 Juni 2022 pukul 09:30 WIB')
    )
    ->setOccurrenceDateTime((new FHIRDateTime())->setValue('2022-06-14T09:30:27+07:00'))
    ->setAuthoredOn((new FHIRDateTime())->setValue('2022-06-13T12:30:27+07:00'))
    ->setRequester(
        (new FHIRReference())
        ->setReference('Practitioner/N10000001')
        ->setDisplay('Dokter Bronsig')
    )->addPerformer(
        (new FHIRReference())
        ->setReference('Practitioner/N10000001')
        ->setDisplay('Dokter Bronsig')
    )
    ->addReasonCode(
        (new FHIRCodeableConcept())
        ->setText('Periksa jika ada kemungkinan Tuberculosis')
    );

$apiInstance->resourcePost($sr);