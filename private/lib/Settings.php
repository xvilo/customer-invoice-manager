<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

/**
 * Class Settings
 */
class Settings
{
    /**
     * @var Array all settings from settings file.
     */
    private $settings;

    /**
     * @var Settings current instance when set as global.
     */
    private static $instance;

    /**
     * Settings constructor.
     * @param $settings array of settings. Key => Value pair
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    /**
     * Make this capsule instance available globally.
     *
     * @return void
     */
    public function setAsGlobal()
    {
        static::$instance = $this;
    }

    public function get($key)
    {
        return $this->settings[$key];
    }

    public static function getInstance()
    {
        return static::$instance;
    }
}