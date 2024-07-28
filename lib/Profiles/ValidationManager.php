<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;

class ValidationManager
{
    // Singleton for ValidationManager
    private static $manager; // = new ValidationManager();

    /** @var ProfileValidation[] */
    private $plugins = [];

    /** @var string[] $profiles */
    private $profiles;

    /** @var array */
    private $config;

    private function __construct()
    {
        $this->config = require(__DIR__ . '/../Config/Validation.php');
    }

    /**
     * @param string[] $profiles
     */
    public function setProfile($profiles)
    {
        $this->profiles = $profiles;

        // load class berdasarkan profile
        foreach ($this->profiles as $profile) {
            if (isset($this->config[$profile]) && is_array($this->config[$profile])) {
                foreach ($this->config[$profile] as $class) {
                    $plugin = new $class();
                    $this->plugins[] = $plugin;
                }
            }
        }
    }

    /**
     * @param SubmitRequest $data
     */
    public function validate($data)
    {
        if (!$data->valid()) {
            throw ValidationException::instance('FIELDS_REQUIRED', $data->listInvalidProperties());
        }

        foreach ($this->plugins as $plugin) {
            $plugin->validate($data);
        }
    }

    public static function instance()
    {
        if (!self::$manager) {
            self::$manager = new ValidationManager();
        }

        return self::$manager;
    }
}
