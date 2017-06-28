<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Response
{
    /**
     * @Serializer\Type("AppBundle\Value\Jira\Fields")
     */
    private $fields;

    /**
     * @Serializer\Type("string")
     */
    private $key;

    public function getFields()
    {
        return $this->fields;
    }

    public function getKey()
    {
        return $this->key;
    }
}