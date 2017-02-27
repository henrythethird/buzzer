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
        $ch = curl_init($this->constructUrl());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->constructRequestContent($buzz));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml; charset="utf-8"'
        ));

        curl_exec($ch);

        curl_close($ch);
    }

    private function constructRequestContent(Buzz $buzz)
    {
        $xml = $this->templating->render('print/ticket.xml.twig', [
            'buzz' => $buzz
        ]);

        simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);

        return json_decode($json,TRUE);
    }

    private function constructUrl()
    {
        return sprintf("http://%s/cgi-bin/epos/service.cgi?devid=local_printer&timeout=6000", $this->printerIp);
    }
}