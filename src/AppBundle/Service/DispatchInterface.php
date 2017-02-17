<?php

namespace AppBundle\Service;

use AppBundle\Entity\Buzz;

interface DispatchInterface
{
    public function dispatch(Buzz $buzz);
}