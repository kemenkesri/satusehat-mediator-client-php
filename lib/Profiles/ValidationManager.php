<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

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
                    if ($plugin instanceof ProfileValidation) {
                        $this->plugins[] = $plugin;
                    }
                }
            }
        }
    }

    /**
     * @param SubmitRequest $data
     * @throws ValidationException
     */
    public function validate($data, $class = null)
    {
        if (!$data->valid()) {
            throw ValidationException::create('FIELDS_REQUIRED', $data->listInvalidProperties());
        }

        foreach ($this->plugins as $plugin) {
            $plugin->validate($data, $class);
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
