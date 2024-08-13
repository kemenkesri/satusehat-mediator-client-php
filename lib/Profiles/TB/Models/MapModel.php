<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB\Models;

class MapModel
{
    public $maps = [];

    public $modelMap;
    public function __construct($modelMap)
    {
        $this->modelMap = $modelMap;
    }

    public function addServiceRequest($callback)
    {
        $callable = $callback(new $this->modelMap());
        $this->maps[] = $callable->getData();
        return $this;
    }

    public function getMap()
    {
        return $this->maps;
    }
}