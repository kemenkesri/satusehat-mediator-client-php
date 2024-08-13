<?php

use Mediator\SatuSehat\Lib\Client\Configuration;

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
        'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
        $clientId,
        $clientSecret,
        'RVWrblJr9uS1PHE5JGxLNIeLWpEK',
        '+07:00'
    )
);

$response = satuSehatShowData("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/ServiceRequest/c7f7365e-8f4f-484c-99d5-8713ac2621aa/_history/MTcyMjY3NjYwNDQ5NzAxNDAwMA");
dump($response);
