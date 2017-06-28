<?php

namespace AppBundle\Value\Jira;

use JMS\Serializer\Annotation as Serializer;

class Creator
{
    /**
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("emailAddress")
     */
    private $emailAddress;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("displayName")
     */
    private $displayName;

    /**
     * @Serializer\Type("string")
     */
    private $self;

    public function getName()
    {
        return $this->name;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getSelf()
    {
        return $this->self;
    }
}