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
class Cim_Frontend_Page
{
    protected $templatePath = null;
    private $templateFile = null;
    private $activeTemplate = 'start';
    private $templateDir = '../../templates/';

    /**
     * Cim_Frontend_Page_ErrorPage constructor.
     */
    public function __construct($requestData)
    {
        $this->templateFile = $this->getTemplateFile();
        $this->loadTemplate($requestData);
    }

    final private function getTemplateFile()
    {
        if ($this->templatePath === null) {
            $className = get_class($this);
            $twigPath = str_replace("Cim_", "", $className);
            $twigPath = str_replace("_", "/", $twigPath);
            $templateFile = $twigPath . ".html.twig";
        }

        $templateFile = $this->templatePath . ".html.twig";

        return $templateFile;
    }

    final private function loadTemplate($requestData)
    {
        $loader = new Twig_Loader_Filesystem($this->templateDir.$this->activeTemplate);
        $twig = new Twig_Environment($loader, array(
            'cache' => '../../../var/cache/',
        ));

        echo $twig->render($this->templateFile, $requestData);
    }
}
