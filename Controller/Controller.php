<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 01/12/16
 * Time: 15:48
 */

namespace Romenys\Framework\Controller;


use Knp\Snappy\Pdf;
use Romenys\Framework\Components\Parameters;

class Controller
{
    private $snappy;

    private $pdfBin = 'vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64';

    public function __construct()
    {
        $this->setSnappy();
    }

    /**
     * @return Pdf
     */
    public function getSnappy()
    {
        return $this->snappy;
    }

    /**
     * @return Controller
     */
    public function setSnappy()
    {
        $this->snappy = new Pdf($this->getPdfBin());

        return $this;
    }

    /**
     * @return string
     */
    public function getPdfBin()
    {
        return $this->pdfBin;
    }

    /**
     * @param string pdfBin
     *
     * @return Controller
     */
    public function setPdfBin($pdfBin)
    {
        $this->pdfBin = $pdfBin;

        return $this;
    }

    /**
     * @param string $templateDir Directory containing the template
     * @param string $template Template full file name
     * @param array $data Data to inject to the template
     *
     * @return string
     */
    public function render($templateDir, $template, $data)
    {
        $parameters = new Parameters();
        $cache = $parameters->getParameters()["cache"];

        $loader = new \Twig_Loader_Filesystem($templateDir);
        $twig = new \Twig_Environment($loader, ["cache" => $cache]);

        return $twig->render($template, $data);
    }
}