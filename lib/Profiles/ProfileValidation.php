<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;

abstract class ProfileValidation
{
    /** 
     * @param SubmitRequest $data
     * 
     * @throws ValidationException
     */
    abstract public function validate($data, $class = null);
}
