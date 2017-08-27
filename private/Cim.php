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

/**
 * Class Cim
 */
class Cim
{
    /**
     * @var \Klein\Klein
     */
    private $kleinInstance = null;

    /**
     * Cim constructor.
     * @param $settings
     */
    public function __construct($settings)
    {

        // Setup Database
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

        // Set Settings
        $settings = new Settings($settings);
        $settings->setAsGlobal();
    }

    /**
     * Main function to start application.
     * Gets route data first then creates
     * a new instance for that date gotten by
     * the Route class.
     */
    public function run()
    {
        $route = new Routes($this->getKleinInstance());
        $routeData = $route->getRouteData();
        new $routeData['handler']($routeData['requestData']);
    }

    /**
     * Gets an instance of Klein.php.
     * @return \Klein\Klein
     */
    private function getKleinInstance()
    {
        if ($this->kleinInstance == null) {
            $this->kleinInstance = new Klein\Klein;
        }

        return $this->kleinInstance;
    }
}
