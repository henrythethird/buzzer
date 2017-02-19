<?php

namespace AppBundle\Service;

use AppBundle\Entity\Buzz;
use Symfony\Bundle\TwigBundle\TwigEngine;

class PrintService implements DispatchInterface
{
    /**
     * @var string
     */
    private $printerIp;

    /**
     * @var \Twig_Environment
     */
    private $templating;

    public function __construct($printerIp, \Twig_Environment $templating)
    {
        $this->printerIp = $printerIp;
        $this->templating = $templating;
    }

    public function dispatch(Buzz $buzz)
    {
        try {
            $soap = new \SoapClient($this->printerIp);
            $content = $this->constructRequestContent($buzz);

            $method = "epos-print";
            $soap->$method($content);
        } catch (\SoapFault $fault) {
            // Ignore the fault for now (very bad practice -> don't do this at home)
        }
    }

    private function constructRequestContent(Buzz $buzz)
    {
        return new \SoapVar($this->templating->render('print/ticket.xml.twig', [
            'buzz' => $buzz
        ]), XSD_ANYXML);
    }
}