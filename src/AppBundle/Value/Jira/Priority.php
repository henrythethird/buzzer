<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Priority
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