<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use Exception;

class ValidationException extends Exception
{
    private static $ERROR_MAP;

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

    public static function instance(string $type, $errors = []): ValidationException
    {
        if (!isset(self::$ERROR_MAP)) {
            self::$ERROR_MAP = require(__DIR__ . '/../Config/ErrorCodes.php');
        }

        if (isset(self::$ERROR_MAP[$type])) {
            $error = self::$ERROR_MAP[$type];
            $message = $error['message'];
            foreach ($errors as $err) {
                $message .= "\n" . $err;
            }
            return new ValidationException($message, $error['code']);
        }

        return new ValidationException('UNKNOWN', 4999);
    }
}
