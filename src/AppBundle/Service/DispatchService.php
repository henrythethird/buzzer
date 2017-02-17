<?php

namespace AppBundle\Service;

use AppBundle\Entity\Buzz;

class DispatchService
{
    /**
     * @var DispatchInterface[]
     */
    private $dispachables = [];

    /**
     * @param DispatchInterface[] $dispatchables
     */
    public function __construct(array $dispatchables = [])
    {
        $this->dispachables = $dispatchables;
    }

    public function addDispatch(DispatchInterface $dispatch)
    {
        $this->dispachables[] = $dispatch;
    }

    public function dispatchBuzz(Buzz $buzz)
    {
        foreach ($this->dispachables as $dispachable) {
            $dispachable->dispatch($buzz);
        }
    }
}