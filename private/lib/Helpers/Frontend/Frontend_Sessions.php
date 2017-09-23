<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

class Frontend_Sessions
{
    private static $_instance = null;
    private $_predisInstance;

    public function __construct()
    {
        $this->_predisInstance = External_Object_Predis::get();
    }

    public static function get()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getCustomer()
    {
        return false;
    }
}
