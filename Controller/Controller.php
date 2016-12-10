<?php
/**
 * Created by iKNSA.
 * Author: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 01/12/16
 * Time: 15:48
 */

namespace Romenys\Framework\Controller;


use Knp\Snappy\Pdf;

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
     * @param string $template absolute path to template
     * @param array $data
     *
     * @return string
     */
    public function render($template, $data)
    {
        $mustache = new \Mustache_Engine;

        return $mustache->render(file_get_contents($template), $data);
    }
}