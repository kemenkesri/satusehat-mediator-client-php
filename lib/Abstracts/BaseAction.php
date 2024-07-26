<?php

namespace Mediator\SatuSehat\Lib\Client\Abstracts;

abstract class BaseAction
{
    public function __construct()
    {
        return $this->rules();
    }

    abstract public function rules(): self;

    abstract public function handle(): mixed;
}