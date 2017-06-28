<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Project
{
    /**
     * @Serializer\Type("string")
     */
    private $key;

    /**
     * @Serializer\Type("string")
     */
    private $name;

    public function getKey()
    {
        return $this->key;
    }

    public function getName()
    {
        return $this->name;
    }
}