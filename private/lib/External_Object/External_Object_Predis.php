<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

class External_Object_Predis
{

    /**
     * @var PredisClient
     * @return PredisClient
     */
    private static $_predisInstance;

    /**
     * External_Object_Predis constructor.
     */
    public function __construct()
    {
        try {
            $redis = new Predis\Client();
            /*
                $redis = new PredisClient(array(
                    "scheme" => "tcp",
                    "host" => "127.0.0.1",
                    "port" => 6379));
            */
            echo "Successfully connected to Redis";
        }
        catch (Exception $e) {
            echo "<pre>";
            echo "Couldn't connected to Redis";
            echo $e->getMessage();
            die();
        }

        self::$_predisInstance = $redis;
        return $redis;
    }

    /**
     * @return PredisClient
     */
    public static function get()
    {
        if(self::$_predisInstance === null){
            self::$_predisInstance = new self();
        }

        return self::$_predisInstance;
    }
}