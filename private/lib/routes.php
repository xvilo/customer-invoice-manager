<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

class Routes
{
    private $klein = null;

    public function __construct($kleinInstance)
    {
        $this->klein = $kleinInstance;
    }

    /**
     * @param $queryString string the query string
     * @return array
     */
    public function getRouteData($queryString)
    {
        $this->klein->respond('GET', '/hello-world', function () {
            return 'Hello World!';
        });

        // Throw 404 when there are no matching routes
        $klein->respond(function () {
            return $this->buildReturnData('Cim_Frontend_Page_NotFond');
        });
    }

    private function buildReturnData($handlerClass, $requestData = null)
    {
        return [
            'requestData' => $requestData,
            'handler' => $handlerClass,
        ];
    }
}
