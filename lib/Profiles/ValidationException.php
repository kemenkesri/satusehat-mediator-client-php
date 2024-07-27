<?php

namespace Mediator\SatuSehat\Lib\Client;

use Exception;

class ValidationException extends Exception
{
    private const ERROR_MAP = require(__DIR__ . '/../Config/ErrorCodes.php');

    /**
     * Constructor
     *
     * @param string        $message         Error message
     * @param int           $code            HTTP status code
     */
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }

    public static function instance(string $type): ValidationException
    {
        if (isset(self::ERROR_MAP[$type])) {
            $error = self::ERROR_MAP[$type];
            return new ValidationException($error['message'], $error['code']);
        }

        return new ValidationException('UNKNOWN', 4999);
    }
}
