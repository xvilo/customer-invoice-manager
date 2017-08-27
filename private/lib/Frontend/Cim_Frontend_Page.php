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
    private $templateDir;

    /**
     * Cim_Frontend_Page_ErrorPage constructor.
     */
    public function __construct($requestData)
    {
        $this->templateFile = $this->getTemplateFile();
        $this->templateDir = Settings::get('application-dir').'/private/templates/';
        $this->loadTemplate($requestData);
    }


    /**
     * Page data. Array of data used in twig.
     *
     * @return array
     */
    protected function pageData()
    {
        return [];
    }

    final private function getTemplateFile()
    {
        if ($this->templatePath === null) {
            $className = get_class($this);
            $twigPath = str_replace("Cim_", "", $className);
            $twigPath = str_replace("_", "/", $twigPath);
            $templateFile = $twigPath . ".html.twig";
        } else {
            $templateFile = $this->templatePath . ".html.twig";
        }

        return $templateFile;
    }

    final private function loadTemplate($requestData)
    {
        $twigSettings = array();

        $activeTemplate = Settings::get('active-template');
        $loader = new Twig_Loader_Filesystem($this->templateDir.$activeTemplate);

        if (Settings::get('use-cache') === true) {
            array_push($twigSettings, ['cache' => Settings::get('application-dir').'/var/cache']);
        }

        $twig = new Twig_Environment($loader, $twigSettings);

        echo $twig->render($this->templateFile, $this->getTwigData($requestData, $this->pageData()));
    }

    final private function getTwigData($requestData = [], $pageData = [])
    {
        return [
            'requestData' => $requestData,
            'pageData' => $pageData
        ];
    }
}
