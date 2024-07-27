<?php

namespace Mediator\SatuSehat\Lib\Client;

use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;

abstract class ProfileValidation
{
    /** 
     * @param SubmitRequest $data
     * 
     * @throws ValidationException
     */
    abstract function validate($data);
}
