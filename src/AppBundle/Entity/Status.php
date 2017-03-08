<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Status
{
    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    const STATUS_UNCONFIRMED = 0;
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;
    const STATUS_INVALID = 3;

    const MAP = [
        self::STATUS_UNCONFIRMED => "Unconfirmed",
        self::STATUS_OPEN => "Open",
        self::STATUS_CLOSED => "Closed",
        self::STATUS_INVALID => "Invalid"
    ];

    public function __construct($status = self::STATUS_UNCONFIRMED)
    {
        $this->status = $status;
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     * @return Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function __toString()
    {
        return self::MAP[$this->getStatus()];
    }
}