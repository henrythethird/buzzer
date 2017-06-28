<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Status
{
    /**
     * @Serializer\Type("string")
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }
}