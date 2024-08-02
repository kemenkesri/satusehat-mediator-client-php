<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Models;

class MapModel
{
    public array $maps = [];

    public $modelMap;
    public function __construct($modelMap)
    {
        $this->modelMap = $modelMap;
    }

    public function addServiceRequest(callable $callback): self
    {
        $callable = $callback(new $this->modelMap());
        $this->maps[] = $callable->getData();
        return $this;
    }

    public function getMap(): array
    {
        return $this->maps;
    }
}