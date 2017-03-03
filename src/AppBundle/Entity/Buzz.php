<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuzzRepository")
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
    private $issueDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $resolveDate;

    /**
     * @ORM\Embedded(class="AppBundle\Entity\Status")
     * @var Status
     */
    private $status;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $description;

    public function __construct()
    {
        $this->issueDate = new \DateTime();
        $this->status = new Status();
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
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTime $issueDate
     * @return Buzz
     */
    public function setIssueDate(\DateTime $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getResolveDate()
    {
        return $this->resolveDate;
    }

    /**
     * @param \DateTime $resolveDate
     * @return Buzz
     */
    public function setResolveDate(\DateTime $resolveDate = null)
    {
        $this->resolveDate = $resolveDate;
        return $this;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     * @return Buzz
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Buzz
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}