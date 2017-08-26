<?php
/**
 * Created by PhpStorm.
 * User: xvilo
 * Date: 8/26/17
 * Time: 7:33 PM
 */
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

Class Cim {

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

    public function run(){
        echo 'run';
    }
}