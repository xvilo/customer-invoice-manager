<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

/**
 * Class Cim_Frontend_Page_ErrorPage
 */
class Cim_Frontend_Service_Login extends Cim_Frontend_Service
{
    protected function pageData()
    {
        throw new UserException('error reason');

        return [
            'redirect' => '/app',
        ];
    }
}
