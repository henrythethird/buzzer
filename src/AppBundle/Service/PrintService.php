<?php

namespace AppBundle\Service;

use AppBundle\Entity\Buzz;
use AppBundle\Repository\FirefighterRepository;
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

    /**
     * @var FirefighterRepository
     */
    private $firefighterRepository;

    public function __construct($printerIp, \Twig_Environment $templating, FirefighterRepository $firefighterRepository)
    {
        $this->printerIp = $printerIp;
        $this->templating = $templating;
        $this->firefighterRepository = $firefighterRepository;
    }

    public function dispatch($postFields)
    {
        $ch = curl_init($this->constructUrl());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: text/xml; charset="utf-8"'
        ));

        curl_exec($ch);

        curl_close($ch);
    }

    private function constructUrl()
    {
        return sprintf("http://%s/cgi-bin/epos/service.cgi?devid=local_printer&timeout=6000", $this->printerIp);
    }
}