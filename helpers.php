<?php

/**
 * @param string $url
 * @return mixed
 */
function satuSehatShowData(string $url)
{
    return (new \Mediator\SatuSehat\Lib\Client\Api\SatuSehatShowData($url))
        ->getData();
}