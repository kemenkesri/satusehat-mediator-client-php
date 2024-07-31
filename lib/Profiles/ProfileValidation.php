<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

abstract class ProfileValidation
{
    /** 
     * @param MediatorForm $form
     * 
     * @throws ValidationException
     */
    abstract public function validate($form);
}
