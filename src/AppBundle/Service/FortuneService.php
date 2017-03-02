<?php

namespace AppBundle\Service;

class FortuneService {
    public function generate()
    {
        return shell_exec($this->prepareCommand());
    }

    private function prepareCommand()
    {
        return "fortune -s";
    }
}