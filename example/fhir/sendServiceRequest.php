<?php

use DCarbone\PHPFHIRGenerated\R4\FHIRElement\FHIRIdentifier;
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
        timezone: '+07:00',
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
;

$apiInstance->resourcePost($sr);