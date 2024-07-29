<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles\TB;

abstract class Validation
{
    /**
     * @return array
     */
    protected function validationRules(): array
    {
        if (property_exists($this, 'defaultRules')){
            return array_merge($this->defaultRules, $this->mustValidated());
        }
        return $this->mustValidated();
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function validatedMethod()
    {
        $dataMissing = [];
        foreach ($this->validationRules() as $key => $validationRule) {
            $setter = "set{$validationRule}";
            if (!method_exists($this, $setter)) {
                throw new \Exception('Method for ' . $setter . '  does not exists', 500);
            }
            $getter = "get{$validationRule}";
            if (!method_exists($this->data, $getter)) {
                throw new \Exception('Method for ' . $getter . ' does not exists', 500);
            }

            $dataReceive = $this->data->{$getter}();
            if (!$dataReceive) {
                $dataMissing[] = $validationRule;
            }
        }

        if (count($dataMissing) > 0) {
            throw new \Exception('Missing required data for ('. implode(' & ', $dataMissing) .')', 500);
        }
    }


    /**
     * @return array
     */
    abstract protected function mustValidated(): array;
}