<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Firefighter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $activeFrom;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * @param mixed $activeFrom
     * @return Firefighter
     */
    public function setActiveFrom($activeFrom)
    {
        $this->activeFrom = $activeFrom;
        return $this;
    }
}