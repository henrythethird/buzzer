<?php

namespace AppBundle\Service;

class FortuneService {
    private $fortunePath;

    public function __construct($fortunePath)
    {
        $this->fortunePath = $fortunePath;
    }

    public function generate()
    {
        return shell_exec($this->fortunePath);
    }
}