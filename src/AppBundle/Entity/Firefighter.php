<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FirefighterRepository")
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $activeFrom;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $activeTo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Firefighter
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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

    /**
     * @return \DateTime
     */
    public function getActiveTo()
    {
        return $this->activeTo;
    }

    /**
     * @param \DateTime $activeTo
     * @return Firefighter
     */
    public function setActiveTo($activeTo)
    {
        $this->activeTo = $activeTo;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}