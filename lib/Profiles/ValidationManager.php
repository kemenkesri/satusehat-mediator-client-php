<?php

namespace Mediator\SatuSehat\Lib\Client\Profiles;

use Mediator\SatuSehat\Lib\Client\Model\SubmitRequest;

class ValidationManager
{
    // Singleton for ValidationManager
    private static $manager; // = new ValidationManager();
    private $plugins = [];

    /** @var string[] $profiles */
    private $profiles;

    private function __construct()
    {

    }

    // TODO: load plugins by profile

    /**
     * @param string[] $profiles
     */
    public function setProfile($profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * @param SubmitRequest $data
     */
    public function validate($data)
    {
        foreach ($this->plugins as $k => $plugin) {
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
