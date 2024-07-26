<?php

namespace Mediator\SatuSehat\Lib\Client;

use Throwable;

class CallbackResource
{
    public string $status;
    public int $code;
    public string $message;
    public mixed $data;

    public function __construct(
        string $status = 'success',
        int    $code = 200,
        string $message = 'success',
        mixed  $data = null
    ) {
        $this->status = $status;
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }
}