<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

Class Cim {
    private $kleinInstance = null;

    function __construct($settings)
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $settings['database']['host'],
            'database'  => $settings['database']['database'],
            'username'  => $settings['database']['username'],
            'password'  => $settings['database']['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
    }

    public function run()
    {
        $klein = $this->getKleinInstance();

        $klein->respond('GET', '/hello-world', function () {
            echo 'Hello World!';
        });
    }

    private function getKleinInstance()
    {
        if($this->kleinInstance == null){
            $this->kleinInstance = new Klein\Klein;
        }

        return $this->kleinInstance;
    }
}