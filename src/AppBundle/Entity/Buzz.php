<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Buzz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Buzz
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }
}