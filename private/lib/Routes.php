<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

/**
 * Class Routes
 */
class Routes
{
    /**
     * @var \Klein\Route
     */
    private $klein = null;

    /**
     * @var array
     */
    private $routeData = [];

    /**
     * Routes constructor.
     * @param $kleinInstance
     */
    public function __construct($kleinInstance)
    {
        $this->klein = $kleinInstance;
        $this->generateRouteData();
    }

    /**
     * Routes kan be added here. Routes are processed with Klein.php.
     * This function processes all routes and returns correct data.
     *
     * @return array
     */
    private function generateRouteData()
    {
        $this->klein->respond('GET', '/hello-world', function () {
            $this->routeData = $this->buildReturnData('Cim_Frontend_Page_HelloWorld');
        });

        $this->klein->onHttpError(function ($code, $router) {
            $returnData = [
                'code' => $code,
            ];
            $this->routeData = $this->buildReturnData('Cim_Frontend_Page_ErrorPage', $returnData);
        });

        $this->klein->dispatch();
    }

    public function getRouteData()
    {
        return $this->routeData;
    }

    /**
     * This function easily generates the return array for routes
     *
     * @param $handlerClass
     * @param null $requestData
     * @return array
     */
    private function buildReturnData($handlerClass, $requestData = null)
    {
        return [
            'handler' => $handlerClass,
            'requestData' => $requestData,
        ];
    }
}